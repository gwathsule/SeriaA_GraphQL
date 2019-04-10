<?php


namespace App\GraphQL\Type;

use App\Team;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TeamType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Team',
        'description' => 'Footbal team',
        'model' => Team::class, // define model for users type
    ];

    public function fields()
    {
        return [
            'technician' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Team coach.'
            ],
            'qtd_yellow_cards' => [
                'type' => Type::int(),
                'description' => 'Number of yellow cards.'
            ],
            'qtd_red_cards' => [
                'type' => Type::int(),
                'description' => 'Number of red cards.'
            ],
            'position' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Position of the team in the championship.'
            ],
            'points' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Current team score in the championship.'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of the team.'
            ],
            'initials' => [
                'type' => Type::string(),
                'description' => 'Team initials containing three letters.'
            ],
            'shield_image' => [
                'type' => Type::string(),
                'description' => 'Image URL with team shield.'
            ],
        ];
    }
}