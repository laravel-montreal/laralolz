<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Outing extends Model {

	use SoftDeletes;

	protected $fillable = ['slug', 'title', 'subtitle', 'starts_at', 'ends_at', 'description'];

    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    public function conference()
    {
        return $this->belongsTo('App\Conference');
    }

    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User');
    }
}
