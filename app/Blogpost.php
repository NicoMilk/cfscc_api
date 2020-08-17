<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'title', 'content'
    ];
    protected $primaryKey = 'blogpost_id';    //custom primaryKey

    // Relationships
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // public function getCreatedAtAttribute($createdat) {  // TODO MAKE THIS ACCESSOR WORKING
    //     return Carbon::parse($createdat)->format('Y-m-d');
    // }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
    ];

}
