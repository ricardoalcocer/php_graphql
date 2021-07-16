<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class EventFormats extends Model{
        protected $table    = 'events_formats';
        public $timestamps  = false;
        protected $fillable = ['name','description'];
    }
        