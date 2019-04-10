<?php


namespace App\GraphQL\Query;

use App\TeamRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

class TeamQuery extends Query
{
    protected $repository;

    protected $attributes = [
        'name' => 'Team_Query',
        'description' => 'A query of teams'
    ];

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('team');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'technician' => [
                'name' => 'technician',
                'type' => Type::string()
            ],
            'qtd_yellow_cards' => [
                'name' => 'qtd_yellow_cards',
                'type' => Type::int()
            ],
            'qtd_red_cards' => [
                'name' => 'qtd_red_cards',
                'type' => Type::int()
            ],
            'position' => [
                'name' => 'position',
                'type' => Type::int()
            ],
            'points' => [
                'name' => 'points',
                'type' => Type::int()
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string()
            ],
            'initials' => [
                'name' => 'initials',
                'type' => Type::string()
            ],
            'shield_image' => [
                'name' => 'shield_imag',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $selectFields)
    {
        $fields = $selectFields->getSelect();
        return $this->repository->getItemsByArguments($args, $fields);
    }
}