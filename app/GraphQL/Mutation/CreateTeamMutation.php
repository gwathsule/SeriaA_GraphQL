<?php


namespace App\GraphQL\Mutation;

use App\TeamRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateTeamMutation extends Mutation
{
    protected $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    protected $attributes = [
        'name' => 'Create_Team'
    ];

    public function type()
    {
        return GraphQL::type('team');
    }

    public function args()
    {
        return [
            'technician' => [
                'name' => 'technician',
                'type' => Type::nonNull(Type::string()),
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
                'type' => Type::nonNull(Type::int()),
            ],
            'points' => [
                'name' => 'points',
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
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
        return $this->repository->create($args);
    }
}