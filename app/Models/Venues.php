<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class Venues extends Model{
        protected $table    = 'venues';
        public $timestamps  = false;
        protected $fillable = ['name','host_id','addr1','addr2','zipcode','phone','email','website','lon','lat','postal_code','country','administrative_area_level_1','locality','sublocality_level_1','route','street_number','formatted_address'];
    }