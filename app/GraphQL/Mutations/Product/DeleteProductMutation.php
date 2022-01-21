<?php

namespace App\GraphQL\Mutations\Product;

use App\Models\Product;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;

class DeleteProductMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteProduct',
        'description' => 'delete a product'
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
        $product = Product::findOrFail($args['id']);

        return $product->delete() ? true : false;
    }
}
