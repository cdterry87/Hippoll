<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $table = 'polls';

    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
