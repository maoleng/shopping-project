<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use App\Http\Requests\StoreImageRequest;
    use App\Http\Requests\UpdateImageRequest;
    use App\Models\Product;
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
        public function index(): View|Factory|Application
        {
            $products = DB::table('products')
                ->leftJoin('manufacturers','products.manufacturer_id', '=', 'manufacturers.id')
                ->leftJoin('subtypes','products.subtype_id', '=', 'subtypes.id')
                ->leftJoin('types','subtypes.type_id', '=', 'types.id')
                ->leftJoin('images', 'images.product_id', '=', 'products.id')
                ->select('products.*', 'manufacturers.name as manufacturer_name', 'subtypes.name as subtype_name', 'types.name as type_name', 'images.path')
                ->groupBy('images.product_id')
                ->paginate(20);
            return view('customer-page.product', [
                'products' => $products
            ]);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \App\Http\Requests\StoreImageRequest  $request
         * @return Response
         */
        public function store(StoreImageRequest $request)
        {
            //
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Image  $image
         * @return Response
         */
        public function show(Image $image)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Image  $image
         * @return Response
         */
        public function edit(Image $image)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \App\Http\Requests\UpdateImageRequest  $request
         * @param  \App\Models\Image  $image
         * @return Response
         */
        public function update(UpdateImageRequest $request, Image $image)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Image  $image
         * @return Response
         */
        public function destroy(Image $image)
        {
            //
        }
    }
