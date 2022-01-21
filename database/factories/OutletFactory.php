<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Outlet;
use Illuminate\Database\Eloquent\Factories\Factory;

class OutletFactory extends Factory
{
    protected $model = Outlet::class;

    public function definition()
    {
        $brandIDs = Brand::all()->pluck('id')->toArray();

        return [
            'name' => $this->faker->company,
            'picture' => $this->faker->imageUrl,
            'address' => $this->faker->address,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'brand_id' => $this->faker->randomElement($brandIDs)
        ];
    }
}
