<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Mas assigned
    protected $fillable = ['slug', 'donation_from_user', 'donation_to_user', 'donation_for_article', 'amount_donated', 'created_by', 'modified_by'];

    // Mutators
    public function setSlugAttribute($value) {
      $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function userFrom()
    {
      return $this->belongsTo('App\User', 'donation_from_user', 'id');
    }

    public function userTo()
    {
      return $this->belongsTo('App\User', 'donation_to_user', 'id');
    }

    public function article()
    {
      return $this->belongsTo('App\Article', 'donation_for_article', 'id');
    }

    public static function newDonation()
    {
      return new Donation();
    }
}
