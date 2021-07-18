<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;


    class Events extends Model{
        protected $table    = 'events';
        public $timestamps  = false;
        protected $fillable = [
            'guid',
            'host_id',
            'artist_id',
            'venue_id',
            'name',
            'description',
            'format_id',
            'start_at',
            'end_at',
            'max_attendees',
        ];

        public function artist(){
            return $this->belongsTo(Artist::class, 'artist_id');
        }

        public function format(){
            return $this->belongsTo(EventFormats::class, 'format_id');
        }       
    }