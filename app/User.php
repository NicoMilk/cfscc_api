<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'phone', 'role', 'password',
    ];

    public function setLastnameAttribute($lastname)
    {
        $this->attributes['lastname'] = strtoupper($lastname);
    }

    public function setFirstnameAttribute($firstname)
    {
        $this->attributes['firstname'] = ucwords($firstname, '-');
    }

    public function setPhoneAttribute($phone)
    {
        $this->attributes['phone'] = preg_replace('~.{2}(?!$)~', '$0 ', $phone);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'user_id';    //custom primaryKey

    // Relationships
    public function blogposts()
    {
        return $this->hasMany(Blogposts::class);
    }

    public function registrations()
    {
        return $this->belongsToMany(Registrations::class);
    }

}
