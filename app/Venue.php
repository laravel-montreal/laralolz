<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'subtitle', 'description', 'address1',
        'address2', 'address3', 'city', 'state', 'country', 'postal_code', 'phone',
        'url', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outings()
    {
        return $this->hasMany('App\Outing');
    }
}
