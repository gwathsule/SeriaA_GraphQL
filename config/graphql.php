<?php


use example\Mutation\ExampleMutation;
use example\Query\ExampleQuery;
use example\Type\ExampleRelationType;
use example\Type\ExampleType;

return [

    'prefix' => 'graphql',

    'routes' => '{graphql_schema?}',

    'controllers' => \Rebing\GraphQL\GraphQLController::class . '@query',

    'middleware' => [],

    'route_group_attributes' => [],

    'default_schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'team_query' => \App\GraphQL\Query\TeamQuery::class,
            ],
            'mutation' => [
                'update_team'  => \App\GraphQL\Mutation\UpdateTeamMutation::class,
                'create_team'  => \App\GraphQL\Mutation\CreateTeamMutation::class,
                'delete_team'  => \App\GraphQL\Mutation\DeleteTeamMutation::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],


    'types' => [
        'team' => \App\GraphQL\Type\TeamType::class,
    ],


    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],

    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],

    'params_key'    => 'variables',

    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false
    ],

    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    'graphiql' => [
        'prefix' => '/graphiql/{graphql_schema?}',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],
];
