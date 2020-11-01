<?php

namespace App\GraphQL\Types;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        "name" => "User",
        "description" => "A user",
        "model" => User::class,
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::nonNull(Type::int()),
                "description" => "User ID",
            ],
            "name" => [
                "type" => Type::nonNull(Type::string()),
            ],
            "email" => [
                "type" => Type::nonNull(Type::string()),
            ],
        ];
    }
}
