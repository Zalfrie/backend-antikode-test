<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $brandIDs = Brand::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->company,
            'picture' => $this->faker->image,
            'price' => $this->faker->randomFloat(2, 0, 10000),
            'brand_id' => $this->faker->randomElement($brandIDs)
        ];
    }
}
