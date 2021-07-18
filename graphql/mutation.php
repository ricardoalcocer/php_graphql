<?php

use App\Models\Artist;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'description' => 'This is the root for mutations',
    'fields' =>[
        'addArtist' => [
            'type' => $artistType,
            'args' => [
                'bio'                           => Type::string(),
                'email'                         => Type::nonNull(Type::string()), //required
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
                'lon'                           => Type::string()
            ],
            'resolve' => function($root, $args) {    
                $artist = new Artist([
                    'bio'                           => $args['bio'],
                    'email'                         => $args['email'],
                    'stagename'                     => $args['stagename'],
                    'fname'                         => $args['fname'],
                    'lname'                         => $args['lname'],
                    'phone'                         => $args['phone'],
                    'avatar'                        => $args['avatar'],
                    'formatted_address'             => $args['formatted_address'],
                    'street_number'                 => $args['street_number'],
                    'route'                         => $args['route'],
                    'sublocality_level_1'           => $args['sublocality_level_1'],
                    'locality'                      => $args['locality'],
                    'administrative_area_level_1'   => $args['administrative_area_level_1'],
                    'country'                       => $args['country'],
                    'postal_code'                   => $args['postal_code'],
                    'lat'                           => $args['lat'],
                    'lon'                           => $args['lon']
                ]);
                $artist->save();
                return $artist->toArray();
            }
        ],
        'editArtist' => [
            'type' => $artistType,
            'args' => [
                'id'                            => Type::nonNull(Type::id()), //required
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
                'lon'                           => Type::string()
            ],
            'resolve' => function($root, $args) {
                $artist                                 = Artist::find($args['id']);
                $artist->bio                            = isset($args['bio']) ? $args['bio'] : $artist->bio;
                $artist->email                          = isset($args['email']) ? $args['email'] : $artist->email;
                $artist->stagename                      = isset($args['stagename']) ? $args['stagename'] : $artist->stagename;
                $artist->fname                          = isset($args['fname']) ? $args['fname'] : $artist->fname;
                $artist->lname                          = isset($args['lname']) ? $args['lname'] : $artist->lname;
                $artist->phone                          = isset($args['phone']) ? $args['phone'] : $artist->phone;
                $artist->avatar                         = isset($args['avatar']) ? $args['avatar'] : $artist->avatar;
                $artist->formatted_address              = isset($args['formatted_address']) ? $args['formatted_address'] : $artist->formatted_address;
                $artist->street_number                  = isset($args['street_number']) ? $args['street_number'] : $artist->street_number;
                $artist->route                          = isset($args['route']) ? $args['route'] : $artist->route;
                $artist->sublocality_level_1            = isset($args['sublocality_level_1']) ? $args['sublocality_level_1'] : $artist->sublocality_level_1;
                $artist->locality                       = isset($args['locality']) ? $args['locality'] : $artist->locality;
                $artist->administrative_area_level_1    = isset($args['administrative_area_level_1']) ? $args['administrative_area_level_1'] : $artist->administrative_area_level_1;
                $artist->country                        = isset($args['country']) ? $args['country'] : $artist->country;
                $artist->postal_code                    = isset($args['postal_code']) ? $args['postal_code'] : $artist->postal_code;
                $artist->lat                            = isset($args['lat']) ? $args['lat'] : $artist->lat;
                $artist->lon                            = isset($args['lon']) ? $args['lon'] : $artist->lon;
                $artist->save();
                return $artist->toArray();
            }
        ],
        'deleteArtist' => [
            'type' => $artistType,
            'args' => [
                'id'                                    => Type::nonNull(Type::id()) //required
            ],
            'resolve' => function($root, $args) {
                $artist                                 = Artist::find($args['id']);
                $artist->delete();
                return $artist->toArray();
            }
        ]
    ]
]);