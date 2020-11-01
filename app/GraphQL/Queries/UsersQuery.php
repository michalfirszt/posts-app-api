<?php

namespace App\GraphQL\Queries;

use GraphQL;
use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        "name" => "users",
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type("user"));
    }

    public function resolve($root, $args)
    {
        return User::all();
    }
}
