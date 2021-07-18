<?php

use App\Models\Artist;
use App\Models\EventFormats;
use App\Models\Events;
use App\Models\Hosts;
use App\Models\Venues;
use App\Models\VenuesPhotos;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Event;

$artistType = new ObjectType([
        'name'                              => 'Artist',
        'description'                       => 'This is the Artist object',
        'fields' => function () use(&$eventType,&$eventFormatType) {
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
        'description'                       => 'This is the Event object',
        'fields' => function () use(&$eventFormatType, &$venueType, &$hostType) {
            return [
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
                'max_attendees'                 => Type::int(),
                'format'                        =>[
                    'type'      =>  $eventFormatType,
                    'resolve'   => function($root, $args) {
                        $id     = $root['format_id'];
                        $format = EventFormats::find($id);
                        return $format->toArray();
                    }
                ],
                'venue'                        =>[               
                    'type'      =>  $venueType,
                    'resolve'   => function($root, $args) {
                        $id = $root['venue_id'];
                        $venue = Venues::find($id);
                        return $venue->toArray();
                    }
                ],
                'host'                        =>[               
                    'type'      =>  $hostType,
                    'resolve'   => function($root, $args) {
                        $id = $root['host_id'];
                        $host = Hosts::find($id);
                        return $host->toArray();
                    }
                ]
            ];
        }
    ]);

$eventFormatType = new ObjectType([
        'name'                              => 'EventFormat',
        'description'                       => 'This is the EventFormat object',
        'fields' => [
            'id'                            => Type::int(),
            'name'                          => Type::string(),
            'description'                   => Type::string()
        ]
    ]);

$venueType  = new ObjectType([
        'name'                              => 'Venue',
        'description'                       => 'This is the Venue object',
        'fields' => function() use(&$photoType) {
            return [ //photoType
                'id'                            => Type::int(),
                'name'                          => Type::string(),
                'host_id'                       => Type::int(),
                'addr1'                         => Type::string(),
                'addr2'                         => Type::string(),
                'zipcode'                       => Type::string(),
                'phone'                         => Type::string(),
                'email'                         => Type::string(),
                'website'                       => Type::string(),
                'lon'                           => Type::string(),
                'lat'                           => Type::string(),
                'postal_code'                   => Type::string(),
                'country'                       => Type::string(),
                'administrative_area_level_1'   => Type::string(),
                'locality'                      => Type::string(),
                'sublocality_level_1'           => Type::string(),
                'route'                         => Type::string(),
                'street_number'                 => Type::string(),
                'formatted_address'             => Type::string(),
                'photos'                        =>[               
                    'type'      =>  Type::listOf($photoType),
                    'resolve'   => function($root, $args) {
                        $id = $root['id'];
                        $photos = VenuesPhotos::where('venue_id', $id)->get();
                        return $photos->toArray();
                    }
                ]
            ];
        }
    ]);


$hostType = new ObjectType([
    'name'                              => 'Host',
    'description'                       => 'This is the Host object',
    'fields' => [
        'id'                            => Type::int(),
        'name'                          => Type::string(),
        'bio'                           => Type::string(),
        'phone'                         => Type::string(),
        'website'                       => Type::string(),
        'avatar'                        => Type::string(),
        'postal_code'                   => Type::string(),
        'country'                       => Type::string(),
        'administrative_area_level_1'   => Type::string(),
        'locality'                      => Type::string(),
        'sublocality_level_1'           => Type::string(),
        'route'                         => Type::string(),
        'street_number'                 => Type::string(),
        'formatted_address'             => Type::string()
    ]
]);

$photoType = new ObjectType([
    'name'                              => 'Photo',
    'description'                       => 'This is the Photo object',
    'fields' => [
        'id'                            => Type::int(),
        'venue_id'                      => Type::int(),
        'url'                           => Type::string(),
        'description'                   => Type::string()
    ]
]);