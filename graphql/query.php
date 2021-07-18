<?php

use App\Models\Artist;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery = new ObjectType([
    'name'          => 'Query',
    'description'   => 'This is the root query area',
    'fields' => [
        'artist' => [
            'type' => $artistType,
            'args' => [
                'id' => Type::int(),
            ],
            'resolve' => function($root,$args){
                $thisArtist = Artist::find($args['id'])->toArray();
                return $thisArtist;
            }
        ]
        ]
    ]
);