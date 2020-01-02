<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserResponse;
use App\Question;

class StatController extends Controller
{
    public function stats(Question $question)
    {
        return response()->json(UserResponse::where('question_id', $question->id)->get());
    }
}
