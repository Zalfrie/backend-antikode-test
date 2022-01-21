<?php

namespace App\GraphQL\Mutations\Brand;

use App\Models\Brand;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteBrandMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteBrand',
        'description' => 'delete a brand'
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
        $brand = Brand::findOrFail($args['id']);

        return $brand->delete() ? true : false;
    }
}
