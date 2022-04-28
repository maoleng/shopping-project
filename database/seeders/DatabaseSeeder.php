<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Manufacturer;
use App\Models\Product;
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
         Subtype::factory(32)->create();
         Manufacturer::factory(30)->create();
         Product::factory(1000)->create();
         Image::factory(3000)->create();
         Specification::factory(10000)->create();
         SpecificationProduct::factory(10000)->create();

    }
}
