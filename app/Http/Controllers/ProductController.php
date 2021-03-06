<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Admin;
use App\Models\Config;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Specification;
use App\Models\SpecificationProduct;
use App\Models\Subtype;
use App\Models\Type;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $search = $request->q;

        $products = DB::table('products')
            ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
            ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
            ->leftJoin('types','subtypes.type_id', '=', 'types.id')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->where('products.name', 'like', '%'. $search . '%')
            ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
            ->groupBy('images.product_id')
            ->paginate(20);
        $products->appends(['q' => $search]);

        $config = Config::all();
        return view('product.index', [
            'products' => $products,
            'config' => $config,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $manufacturers = Manufacturer::all();
        $subtypes = Subtype::all();


        $config = Config::all();
        return view('product.create', [
            'manufacturers' => $manufacturers,
            'subtypes' => $subtypes,
            'config' => $config,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->except(['_token', 'images']);
        $create_product = Product::query()->create($data);
        $product_id = $create_product->id;

        $specification_data = $request->validated()['specification'];
        $specifications = explode(PHP_EOL, $specification_data);
        foreach ($specifications as $specification) {
            $name = explode(':', $specification)[0];
            $value = explode(':', $specification)[1];
            $create = Specification::query()->create([
                'name' => $name,
                'value' => $value
            ]);
            SpecificationProduct::query()->create([
                'specification_id' => $create->id,
                'product_id' => $product_id
            ]);
        }

        foreach ($request->file('images') as $image) {
            $path = Storage::disk('public')->putFile('products/' . $product_id, $image);
            Image::query()->create([
                'path' => $path,
                'product_id' => $product_id,
            ]);
        }

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('s???n ph???m')
            ->event('th??m')
            ->causedBy($user)
            ->performedOn($create_product)
            ->withProperties([
                'subject_name' => $create_product->name,
                'cause_name' => session()->get('name')
            ])
            ->log('th??m s???n ph???m m???i');

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): View|Factory|Application
    {
        $manufacturers = Manufacturer::all();
        $subtypes = Subtype::all();
        $images = Image::query()->where('product_id', $product->id)->get();

        $specifications = SpecificationProduct::query()
            ->leftJoin('specifications', 'specifications.id', '=', 'specification_products.specification_id')
            ->select(DB::raw("CONCAT(specifications.name, ':',specifications.value, '\n') AS 'name_value' , specification_products.product_id"))
            ->where('specification_products.product_id', $product->id)
            ->get();

        $config = Config::all();
        return view('product.edit', [
            'product' => $product,
            'manufacturers' => $manufacturers,
            'subtypes' => $subtypes,
            'images' => $images,
            'specifications' => $specifications,
            'config' => $config,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {

        $data = $request->except(['_token', '_method', 'specification', 'images']);
        if ($product->price !== (int)$request->price) {
            $data['price_old'] = $product->price;
        }

        if (isset($request->validated()['images'])) {
            $filename = "products/" . $product->id;
            Storage::disk('public')->deleteDirectory($filename);
            Image::query()->where('product_id', $product->id)->delete();
            foreach ($request->file('images') as $image) {

                $path = Storage::disk('public')->putFile('products/' . $product->id, $image);
                Image::query()->where('product_id', $product->id)->create([
                    'path' => $path,
                    'product_id' => $product->id
                ]);

            }
        }

        Product::query()->where('id', $product->id)->update($data);

        $specification_ids = SpecificationProduct::query()->where('product_id', $product->id)
            ->select('specification_id')->get();
        SpecificationProduct::query()->where('product_id', $product->id)->delete();
        foreach ($specification_ids as $specification_id) {
            Specification::query()->where('id', $specification_id->specification_id)->delete();
        }

        $specification_data = $request->validated()['specification'];
        $specifications = explode(PHP_EOL, $specification_data);
        foreach ($specifications as $specification) {
            $name = explode(':', $specification)[0];
            $value = explode(':', $specification)[1];
            $create = Specification::query()->create([
                'name' => $name,
                'value' => $value
            ]);
            SpecificationProduct::query()->create([
                'specification_id' => $create->id,
                'product_id' => $product->id
            ]);
        }

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('s???n ph???m')
            ->event('s???a')
            ->causedBy($user)
            ->performedOn($product)
            ->withProperties([
                'subject_name' => Product::query()->where('id', $product->id)->first()->name,
                'cause_name' => session()->get('name')
            ])
            ->log('c???p nh???t th??ng tin s???n ph???m');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $specification_ids = SpecificationProduct::query()->where('product_id', $product->id)->select('specification_id')->get();
        SpecificationProduct::query()->where('product_id', $product->id)->delete();
        $spec_ids = [];
        foreach ($specification_ids as $specification_id) {
            $spec_ids[] = $specification_id->specification_id;
        }
        Specification::query()->whereIn('id', $spec_ids)->delete();

        $filename = "products/" . $product->id;
        Storage::disk('public')->deleteDirectory($filename);

        Image::query()->where('product_id', $product->id)->delete();
        Product::query()->where('id', $product->id)->delete();

        $user = Admin::query()->find(session()->get('id'));
        activity()
            ->useLog('s???n ph???m')
            ->event('x??a')
            ->causedBy($user)
            ->performedOn($product)
            ->withProperties([
                'subject_name' => $product->name,
                'cause_name' => session()->get('name')
            ])
            ->log('x??a s???n ph???m');

        return redirect()->route('products.index');

    }
}
