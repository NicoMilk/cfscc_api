<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'description', 'date_start', 'date_end', 'price', 'slots_left', 'registered'
    ];
    protected $primaryKey = 'event_id';    //custom primaryKey

}