<?php

namespace App\GraphQL\Mutations\Brand;

use App\Models\Brand;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateBrand',
        'description' => 'updates a brand'
    ];

    public function type(): Type
    {
        return GraphQL::type('Brand');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'logo' => [
                'name' => 'logo',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'banner' => [
                'name' => 'banner',
                'type' =>  Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $brand = Brand::findOrFail($args['id']);
        $brand->fill($args);
        $brand->save();

        return $brand;
    }
}
