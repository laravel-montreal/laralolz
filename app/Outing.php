<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Outing extends Model {

	use SoftDeletes;

	protected $fillable = ['slug', 'title', 'subtitle', 'starts_at', 'ends_at'];

  public function venue()
  {
    return $this->belongsTo('App\Venue');
  }

  public function administrator()
  {
    return $this->belongsTo('App\User');
  }
}
