<?php

use App\Models\Artist;
use App\Models\Events;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Event;

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
        ],
        'artists' => [
            'type' => Type::listOf($artistType),
            'args'          => [
                'first'     => Type::int(),
                'skip'      => Type::int()
            ],
            'resolve' => function($root,$args){
                $artists = Artist::all()->skip($args['skip'])->take($args['first'])->toArray();
                return $artists;
            }
        ],
        'event' => [
            'type' => $eventType,
            'args' => [
                'id' => Type::int(),
            ],
            'resolve' => function($root,$args){
                $event = Events::find($args['id'])->toArray();
                return $event;
            }
        ],
        'events' => [
            'type' => Type::listOf($eventType),
            'args'          => [
                'first'     => Type::int(),
                'skip'      => Type::int()
            ],
            'resolve' => function($root,$args){
                $events = Events::all()->skip($args['skip'])->take($args['first'])->toArray();
                return $events;
            }
        ]
    ]
]);