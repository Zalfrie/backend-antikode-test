<?php

namespace App\GraphQL\Mutations\Outlet;

use App\Models\Outlet;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateOutletMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateOutlet',
        'description' => 'updates a outlet'
    ];

    public function type(): Type
    {
        return GraphQL::type('Outlet');
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
            'picture' => [
                'name' => 'picture',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'address' => [
                'name' => 'address',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'longitude' => [
                'name' => 'longitude',
                'type' =>  Type::nonNull(Type::float()),
            ],
            'latitude' => [
                'name' => 'latitude',
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
        $outlet = Outlet::findOrFail($args['id']);
        $outlet->fill($args);
        $outlet->save();

        return $outlet;
    }
}
