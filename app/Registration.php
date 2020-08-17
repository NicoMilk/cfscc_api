<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id', 'user_id'
    ];
    protected $primaryKey = 'reg_id';    //custom primaryKey

    // Relationships
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function event()
    {
        return $this->belongsToMany(Event::class);  // TODO verifier le type de relation
    }
}
