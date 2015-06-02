<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    protected $fillable = ['slug', 'title', 'subtitle', 'location', 'starts_at', 'ends_at'];

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public function administrator()
    {
        return $this->belongsTo('App\User', 'administrator_id');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User');
    }

}
