<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $guarded = [];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }

    public function responses()
    {
        return $this->hasMany('App\Response');
    }
}
