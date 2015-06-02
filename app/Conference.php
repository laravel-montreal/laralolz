<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model {

    protected $fillable = ['slug', 'title', 'subtitle', 'location', 'starts_at', 'ends_at'];

    public function administrator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

}
