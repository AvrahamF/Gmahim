<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories()
    {
      return $this->hasMany('App\Category', 'created_by', 'id');
    }

    public function articles()
    {
      return $this->hasMany('App\Article', 'created_by', 'id');
    }

    public function role()
    {
      return $this->hasOne('App\Role', 'user_id', 'id');
    }

    public function donationFrom()
    {
      return $this->hasMany('App\Donation', 'donation_from_user', 'id');
    }

    public function donationTo()
    {
      return $this->hasMany('App\Donation', 'donation_to_user', 'id');
    }

    public static function isAdmin()
    {
      return Role::select('role')->where('user_id', Auth::user()->id)->get() == '[{"role":1}]';
    }
}
