<?php

namespace App\GraphQL\Types;

use App\Models\Outlet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OutletType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Outlet',
        'description' => 'list of Outlets',
        'model' => Outlet::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of outlet'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the outlet'
            ],
            'picture' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Picture of the outlet'
            ],
            'address' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Address of the outlet'
            ],
            'longitude' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Longitude of the outlet'
            ],
            'latitude' => [
                'type' => Type::nonNull(Type::float()),
                'description' => 'Latitude of the outlet'
            ],
            'brand' => [
                'type' => GraphQL::type('Brand'),
                'description' => 'The list of the brands'
            ]
        ];
    }
}
