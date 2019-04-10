<?php


namespace App\GraphQL\Mutation;

use App\TeamRepository;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class DeleteTeamMutation extends Mutation
{
    protected $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    protected $attributes = [
        'name' => 'Delete_Team'
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
        ];
    }

    public function resolve($root, $args){
        return $this->repository->deleteUser($args['id'])
            ? 'deleted successfully'
            : 'error while deleting';
    }
}