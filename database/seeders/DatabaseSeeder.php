<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\Specification;
use App\Models\SpecificationProduct;
use App\Models\Subtype;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         Type::factory(4)->create();
         Subtype::factory(8)->create();
         Manufacturer::factory(7)->create();
         Product::factory(250)->create();
         Image::factory(500)->create();
         Specification::factory(2500)->create();
         SpecificationProduct::factory(2500)->create();
         Receipt::factory(1000)->create();
         ReceiptDetail::factory(2500)->create();
    }
}
