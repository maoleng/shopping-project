<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Subtype;
use App\Models\Type;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
    public function index(): View|Factory|Application
    {
        $products = DB::table('products')
            ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
            ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
            ->leftJoin('types','subtypes.type_id', '=', 'types.id')
            ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name')
            ->get();

        return view('product.index', [
            'products' => $products
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

        return view('product.create', [
            'manufacturers' => $manufacturers,
            'subtypes' => $subtypes,
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
        $create = Product::query()->create($data);
        $product_id = $create->id;

        foreach ($request->file('images') as $image) {
            $path = Storage::disk('public')->putFile('products/' . $product_id, $image);
            Image::query()->create([
                'path' => $path,
                'product_id' => $product_id,
            ]);
        }
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

        return view('product.edit', [
            'product' => $product,
            'manufacturers' => $manufacturers,
            'subtypes' => $subtypes,
            'images' => $images
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
        if (empty($request->validated()['images'])) {
            Product::query()->where('id', $product->id)->update($request->validated());
        }

        $filename = "products/" . $product->id;

        Storage::disk('public')->deleteDirectory($filename);

        foreach ($request->file('images') as $image) {
            $path = Storage::disk('public')->putFile('products/' . $product->id, $image);
            Image::query()->where('product_id', $product->id)->update([
                'path' => $path,
            ]);
        }
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $filename = "products/" . $product->id;
        Storage::disk('public')->deleteDirectory($filename);

        Image::query()->where('product_id', $product->id)->delete();
        Product::query()->where('id', $product->id)->delete();

        return redirect()->route('products.index');

    }
}
