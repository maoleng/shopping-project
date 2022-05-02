<?php

    namespace App\Http\Controllers;

    use App\Models\Config;
    use App\Models\Manufacturer;
    use App\Models\Product;
    use App\Models\Subtype;
    use App\Models\Type;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\Response;
    use Illuminate\Support\Facades\DB;

    class DashboardCustomer extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return Application|Factory|View
         */
        public function index(Product $product): View|Factory|Application
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
                'config' => $config,
            ]);
        }

        public function productWhereNoThing(Product $product): Factory|View|Application
        {
            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
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
                'config' => $config,
            ]);
        }

        public function productWhereType(Type $type, Product $product): Factory|View|Application
        {
            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('types.id', $type->id)
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
                'config' => $config,
            ]);
        }

        public function productWhereSubtype(Subtype $subtype, Product $product): Factory|View|Application
        {
            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('subtypes.id', $subtype->id)
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
                'config' => $config,
            ]);
        }

        public function productWhereManufacturer(Manufacturer $manufacturer, Product $product): Factory|View|Application
        {
            $products = $product->query()
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->where('manufacturers.id', $manufacturer->id)
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
                'config' => $config,
            ]);
        }

        public function detailProduct(Product $product): Factory|View|Application
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


            $product = $product->query()
                ->where('products.id', $product->id)
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'types.id as type_id', 'subtypes.id as subtype_id', 'images.path')
                ->groupBy('images.product_id')
                ->first();

            $specifications = DB::table('specification_products')
                ->where('specification_products.product_id', $product->id)
                ->leftJoin('specifications', 'specifications.id', '=', 'specification_products.specification_id')
                ->get();

            $config = Config::all();
            return view('customer-page.product_detail', [
                'types_included' => $types_included,
                'types_grouped' => $types_grouped,
                'product' => $product,
                'specifications' => $specifications,
                'config' => $config,
            ]);
        }


    }
