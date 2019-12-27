<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $guarded = [];

    public function poll()
    {
        $this->belongsTo('App\Poll');
    }

    public function responses()
    {
        $this->hasMany('App\Response');
    }
}
