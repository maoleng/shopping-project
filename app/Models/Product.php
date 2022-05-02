<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'origin', 'insurance',
        'quantity', 'video', 'manufacturer_id', 'subtype_id'
    ];

    public function getStatusProductAttribute(): string
    {
        if ($this->quantity === 0) {
            return 'Hết hàng';
        }
        return 'Còn hàng';
    }

    public function getBeautyPriceAttribute(): string
    {
        return number_format($this->price) . ' Đồng';
    }

    public function getBeautyOldPriceAttribute(): string
    {
        if ($this->price_old === 0) {
            return '';
        }
        return number_format($this->price_old) . ' Đồng';
    }

    public function getSalePercentHTMLAttribute()
    {
        if ($this->price_old === 0) {
            return '';
        }

        return '
            <div class="sale-off">
                <span class="sale-value">' .
                    round(($this->price_old - $this->price) / $this->price_old, 2) * 100 . '%
                </span>
                <span class="sale-label">GIẢM</span>
            </div>
        ';
    }

    public function mostSaleProduct(): Collection|array
    {
        return $this->query()
            ->orderBy(DB::raw('price_old / price'), 'DESC')
            ->take(5)
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.price', 'images.path')
            ->groupBy('images.product_id')
            ->get();
    }

    public function mostNewProduct(): Collection|array
    {
        return $this->query()
            ->orderBy('id', 'DESC')
            ->take(5)
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.price', 'images.path')
            ->groupBy('images.product_id')
            ->get();
    }

    public function mostBoughtProduct()
    {
        $products = ReceiptDetail::query()
            ->orderBy(DB::raw('count(*)'), 'DESC')
            ->groupBy('receipt_details.product_id')
            ->select('product_id')
            ->take(10)
            ->get();

        foreach ($products as $product) {
            $ids[] = $product->product_id;
        }

        return $this->query()
            ->whereIn('products.id', $ids)
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', 'products.price', 'images.path')
            ->groupBy('images.product_id')
            ->get();
    }


}
