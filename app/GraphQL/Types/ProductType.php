<?php

namespace App\GraphQL\Types;

use App\Models\Product;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ProductType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Product',
        'description' => 'list of Products',
        'model' => Product::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of product'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the product'
            ],
            'picture' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Picture of the product'
            ],
            'price' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Price of the product'
            ],
            'brand' => [
                'type' => GraphQL::type('Brand'),
                'description' => 'The list of the brands'
            ]
        ];
    }
}
