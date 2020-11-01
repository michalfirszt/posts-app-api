<?php

namespace App\GraphQL\Queries;

use GraphQL;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{
    protected $attributes = [
        "name" => "user",
    ];

    public function args(): array
    {
        return [
            "id" => [
                "type" => Type::int()
            ],
        ];
    }

    public function type(): Type
    {
        return GraphQL::type("user");
    }

    public function resolve($root, $args)
    {
        return User::findOrFail($args["id"]);
    }
}
