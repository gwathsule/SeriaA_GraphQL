<?php


namespace App\GraphQL\Mutation;

use App\TeamRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateTeamMutation extends Mutation
{
    protected $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    protected $attributes = [
        'name' => 'Update_Team'
    ];

    public function type()
    {
        return GraphQL::type('team');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:teams'],
            ],

            'technician' => [
                'name' => 'technician',
                'type' => Type::string(),
            ],
            'qtd_yellow_cards' => [
                'name' => 'qtd_yellow_cards',
                'type' => Type::int(),
            ],
            'qtd_red_cards' => [
                'name' => 'qtd_red_cards',
                'type' => Type::int(),
            ],
            'position' => [
                'name' => 'position',
                'type' => Type::int()
            ],
            'points' => [
                'name' => 'points',
                'type' => Type::int(),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
            'initials' => [
                'name' => 'initials',
                'type' => Type::string(),
            ],
            'shield_image' => [
                'name' => 'shield_image',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args){
        return $this->repository->update($args);
    }
}