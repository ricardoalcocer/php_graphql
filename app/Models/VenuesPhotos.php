<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class VenuesPhotos extends Model{
        protected $table    = 'venues_photos';
        public $timestamps  = false;
        protected $fillable = ['venue_id','url','description'];
    }