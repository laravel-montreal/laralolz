<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'subtitle', 'location', 'starts_at', 'ends_at', 'description', 'address1', 'address2', 'address3', 'city', 'state', 'country', 'postal_code', 'phone', 'url', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function outings()
    {
        return $this->hasMany('App\Outing');
    }
}
