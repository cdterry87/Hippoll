<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;

class StatController extends Controller
{

    public function index(Poll $poll)
    {
        if (auth()->id() == $poll->user_id) {
            return response()->json($poll->where('id', $poll->id)->with(['questions.responses', 'questions.userresponses', 'user'])->first());
        }
        return false;
    }
}
