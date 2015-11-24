<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outing extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['slug', 'title', 'subtitle', 'starts_at', 'ends_at', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conference()
    {
        return $this->belongsTo('App\Conference');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
