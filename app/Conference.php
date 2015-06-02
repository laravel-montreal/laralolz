<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    protected $fillable = ['slug', 'title', 'subtitle', 'location', 'starts_at', 'ends_at', 'description', 'address1', 'address2', 'address3', 'city', 'state', 'country', 'postal_code', 'phone', 'url', 'email'];

    public function admin()
    {
        return $this->belongsTo('App\User', 'admin_id');
    }

}
