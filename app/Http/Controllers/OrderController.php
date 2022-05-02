<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\StoreReceiptRequest;
    use App\Models\Config;
    use App\Models\Image;
    use App\Models\Product;
    use App\Models\Receipt;
    use App\Models\ReceiptDetail;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class OrderController extends Controller
    {
        public function index(): Factory|View|Application
        {
            $types_included = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('subtypes.id as subtype_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->get();
            $types_grouped = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('types.id as type_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->groupBy('types.id')
                ->get();
            $cart = session()->get('cart');

            $config = Config::all();
            return view('customer-page.cart', [
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'carts' => $cart,
                'config' => $config,
            ]);
        }

        public function addToCart(Product $product): RedirectResponse
        {
            $image = Image::query()->where('product_id', $product->id)->first();
            $cart = session()->get('cart');

            if ( empty($cart[$product->id]) ) {
                $cart[$product->id]['name'] = $product->name;
                $cart[$product->id]['price'] = $product->price;
                $cart[$product->id]['path'] = $image->path;
                $cart[$product->id]['count'] = 1;
            } else {
                $cart[$product->id]['count']++;
            }

            session()->put('cart', $cart);
            return redirect()->back();
        }

        public function modifyQuantity(Request $request): RedirectResponse
        {

            $cart = session()->get('cart');
            $type = $request->type;
            $id = $request->id;

            if ($type === 'decrease') {
                if ($cart[$id]['count'] === 1) {
                    unset($cart[$id]);
                } else {
                    $cart[$id]['count']--;
                }
            } else if ($type === 'increase') {
                $cart[$id]['count']++;
            }
            session()->put('cart', $cart);

            return redirect()->back();
        }

        public function destroy(Request $request): RedirectResponse
        {
            $id = $request->id;
            $cart = session()->get('cart');

            unset($cart[$id]);
            session()->put('cart', $cart);

            return redirect()->back();
        }

        public function checkout(): Factory|View|Application
        {


            $types_included = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('subtypes.id as subtype_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->get();
            $types_grouped = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('types.id as type_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->groupBy('types.id')
                ->get();

            $config = Config::all();
            return view('customer-page.checkout', [
                'carts' => session()->get('cart'),
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'config' => $config,
            ]);
        }

        public function order(StoreReceiptRequest $receipt): RedirectResponse
        {

            $total = 0;
            $carts = session()->get('cart');
            foreach ($carts as $cart) {
                $each = $cart['price'] * $cart['count'];
                $total += $each;
            }
            $data = $receipt->validated();
            $data['total'] = $total;

            $receipt_create = Receipt::query()->create($data);

            $receipt_id = $receipt_create->id;

            foreach ($carts as $key => $cart) {
                ReceiptDetail::query()->create([
                    'receipt_id' => $receipt_id,
                    'product_id' => $key,
                    'name' => $cart['name'],
                    'price' => $cart['price'],
                    'quantity' => $cart['count']
                ]);
            }

            session()->forget('cart');
            return redirect()->route('index');
        }


    }
