<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Poll;

class TakePollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = new User;
        $user_id = $user->where('username', $request->username)->first()->id;

        $poll = new Poll;

        return response()->json($poll->where([
            ['active', 1],
            ['user_id', $user_id],
            ['id', $request->poll_id],
        ])->with('questions.responses')->first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
