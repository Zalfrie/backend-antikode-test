<?php

namespace App\GraphQL\Types;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BrandType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Brand',
        'description' => 'List of Brands',
        'model' => Brand::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of brand'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the brand'
            ],
            'logo' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Logo of the brand'
            ],
            'banner' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Banner of the brand'
            ],
            'outlets' => [
                'type' => Type::listOf(GraphQL::type('Outlet')),
                'description' => 'List of outlets'
            ],
            'products' => [
                'type' => Type::listOf(GraphQL::type('Product')),
                'description' => 'List of products'
            ]
        ];
    }

}
