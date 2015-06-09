<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model {

	use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'subtitle', 'description', 'address1', 'address2', 'address3', 'city', 'state', 'country', 'postal_code', 'phone', 'url', 'email', 'latitude', 'longitude'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outings()
    {
        return $this->hasMany('App\Outing');
    }
}
