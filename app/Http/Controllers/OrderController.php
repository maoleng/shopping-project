<?php

    namespace App\Http\Controllers;

    use App\Models\Image;
    use App\Models\Product;

    class OrderController extends Controller
    {
        public function addToCart(Product $product)
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


    }
