<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model {

	use SoftDeletes;

	protected $fillable = ['slug', 'title', 'subtitle', 'address1', 'address2', 'address3', 'city', 'state', 'country', 'postal_code', 'phone', 'url', 'email', 'latitude', 'longitude'];
}
