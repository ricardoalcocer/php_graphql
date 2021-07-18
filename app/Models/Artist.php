<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class Artist extends Model{
        protected $table    = 'artists';
        public $timestamps  = false;
        protected $fillable = [
            'bio',
            'email',
            'stagename',
            'fname',
            'lname',
            'phone',
            'avatar',
            'formatted_address',
            'street_number',
            'route',
            'sublocality_level_1',
            'locality',
            'administrative_area_level_1',
            'country',
            'postal_code',
            'lat',
            'lon'];
    }
        