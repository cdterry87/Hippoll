<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
