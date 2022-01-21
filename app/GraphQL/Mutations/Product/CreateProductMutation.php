<?php

namespace App\GraphQL\Mutations\Product;

use App\Models\Product;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createProduct',
        'description' => 'Create a Product'
    ];

    public function type(): Type
    {
        return GraphQL::type('Product');
    }

    public function args(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'picture' => [
                'name' => 'picture',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'price' => [
                'name' => 'price',
                'type' =>  Type::nonNull(Type::float()),
            ],
            'brand_id' => [
                'name' => 'brand_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:brands,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $product = new Product();
        $product->fill($args);
        $product->save();

        return $product;
    }
}
