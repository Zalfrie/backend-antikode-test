<?php

namespace App\GraphQL\Mutations\Outlet;

use App\Models\Outlet;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteOutletMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteOutlet',
        'description' => 'delete a outlet'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $outlet = Outlet::findOrFail($args['id']);

        return $outlet->delete() ? true : false;
    }
}
