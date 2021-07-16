<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class Hosts extends Model{
        protected $table    = 'hosts';
        public $timestamps  = false;
        protected $fillable = ['name','bio','phone','website','avatar','postal_code','country','administrative_area_level_1','locality','sublocality_level_1','route','street_number','formatted_address'];
    }