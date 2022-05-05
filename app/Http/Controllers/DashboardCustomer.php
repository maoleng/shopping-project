<?php

    namespace App\Http\Controllers;

    use App\Models\Config;
    use App\Models\Image;
    use App\Models\Manufacturer;
    use App\Models\Product;
    use App\Models\Subtype;
    use App\Models\Type;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class DashboardCustomer extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index(Product $product, Request $request): View|Factory|Application
        {
            $search = $request->get('q');

            $types_included = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('subtypes.id as subtype_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->get();
            $types_grouped = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('types.id as type_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->groupBy('types.id')
                ->get();

            $products_sale = $product->mostSaleProduct();
            $products_new = $product->mostNewProduct();
            $products_bought = $product->mostBoughtProduct();

            $manufacturers = (new Manufacturer)->showManufacturers();

            $config = Config::all();
            return view('home_page', [
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'products_sale' => $products_sale,
                'products_new' => $products_new,
                'products_bought' => $products_bought,
                'manufacturers' => $manufacturers,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function productWhereNoThing(Product $product, Request $request): Factory|View|Application
        {
            $search = $request->get('q');

            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('products.name', 'like', '%' . $search . '%')
                ->groupBy('images.product_id')
                ->paginate(20);
            $products->appends(['q' => $search]);

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
            return view('customer-page.product', [
                'products' => $products,
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function productWhereType(Type $type, Product $product, Request $request): Factory|View|Application
        {
            $search = $request->get('q');

            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('types.id', $type->id)
                ->where('products.name', 'like', '%' . $search . '%')
                ->groupBy('images.product_id')
                ->paginate(20);

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
            return view('customer-page.product', [
                'products' => $products,
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function productWhereSubtype(Subtype $subtype, Product $product, Request $request): Factory|View|Application
        {
            $search = $request->get('q');

            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('subtypes.id', $subtype->id)
                ->where('products.name', 'like', '%' . $search . '%')
                ->groupBy('images.product_id')
                ->paginate(20);

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
            return view('customer-page.product', [
                'products' => $products,
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function productWhereManufacturer(Manufacturer $manufacturer, Product $product, Request $request): Factory|View|Application
        {
            $search = $request->get('q');

            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('manufacturers.id', $manufacturer->id)
                ->where('products.name', 'like', '%' . $search . '%')
                ->groupBy('images.product_id')
                ->paginate(20);

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
            return view('customer-page.product', [
                'products' => $products,
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function detailProduct(Product $product, Request $request): Factory|View|Application
        {
            $search = $request->get('q');

            $types_included = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('subtypes.id as subtype_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->get();
            $types_grouped = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('types.id as type_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->groupBy('types.id')
                ->get();


            $product = $product->query()
                ->where('products.id', $product->id)
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'types.id as type_id', 'subtypes.id as subtype_id', 'images.path')
                ->groupBy('images.product_id')
                ->first();

            $images = Image::query()->where('product_id', $product->id)->get();

            $specifications = DB::table('specification_products')
                ->where('specification_products.product_id', $product->id)
                ->leftJoin('specifications', 'specifications.id', '=', 'specification_products.specification_id')
                ->get();

            $config = Config::all();
            return view('customer-page.product_detail', [
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'product' => $product,
                'images' => $images,
                'specifications' => $specifications,
                'search' => $search,
                'config' => $config,
            ]);
        }

        public function contact(Request $request): Application|View|Factory
        {
            $search = $request->get('q');
            $config = Config::all();

            $types_included = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('subtypes.id as subtype_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->get();
            $types_grouped = DB::table('types')
                ->leftJoin('subtypes', 'subtypes.type_id', '=', 'types.id')
                ->select('types.id as type_id', 'types.name as type_name', 'subtypes.name as subtype_name')
                ->groupBy('types.id')
                ->get();

            return view('customer-page.contact', [
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'search' => $search,
                'config' => $config,
            ]);
        }

    }
