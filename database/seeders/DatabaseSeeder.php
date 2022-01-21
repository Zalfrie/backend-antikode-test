<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Outlet;
use App\Models\Product;
use Database\Factories\BrandFactory;
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
        Brand::factory(10)->create();
        Outlet::factory(10)->create();
        Product::factory(10)->create();
    }
}
