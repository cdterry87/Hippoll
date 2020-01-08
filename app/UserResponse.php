<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    protected $table = 'users_responses';

    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
