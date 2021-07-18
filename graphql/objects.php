<?php

use App\Models\Artist;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$artistType = new ObjectType([
        'name'                              => 'Artist',
        'description'                       => 'This is the Artist endpoint',
        'fields' => function () use(&$eventType) {
            return [
                'id'                            => Type::int(),
                'bio'                           => Type::string(),
                'email'                         => Type::string(),
                'stagename'                     => Type::string(),
                'fname'                         => Type::string(),
                'lname'                         => Type::string(),
                'phone'                         => Type::string(),
                'avatar'                        => Type::string(),
                'formatted_address'             => Type::string(),
                'street_number'                 => Type::string(),
                'route'                         => Type::string(),
                'sublocality_level_1'           => Type::string(),
                'locality'                      => Type::string(),
                'administrative_area_level_1'   => Type::string(),
                'country'                       => Type::string(),
                'postal_code'                   => Type::string(),
                'lat'                           => Type::string(),
                'lon'                           => Type::string(),
                'events'                        => [
                    'type'      => Type::listOf($eventType),
                    'resolve'   => function($root, $args) {
                        $artistId = $root['id'];
                        $artist = Artist::find($artistId);
                        return $artist->events->toArray();   
                    }
                ]
            ];
        }
    ]);

$eventType = new ObjectType([
        'name'                              => 'Event',
        'description'                       => 'This is the Event endpoint',
        'fields' => [
            'id'                            => Type::int(),
            'guid'                          => Type::string(),
            'host_id'                       => Type::int(),
            'artist_id'                     => Type::int(),
            'venue_id'                      => Type::int(),
            'name'                          => Type::string(),
            'description'                   => Type::string(),
            'format_id'                     => Type::int(),
            'start_at'                      => Type::string(),
            'end_at'                        => Type::string(),
            'max_attendees'                 => Type::int()    
        ]
    ]);
