<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Poll;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Auth::user()->polls()->orderBy('created_at', 'desc')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $poll = Poll::create([
            'title' => $request->title,
            'details' => $request->details,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'status' => (bool) $poll,
            'data' => $poll,
            'message' => $poll ? 'Poll created successfully!' : 'Error creating poll!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        if (auth()->id() == $poll->user_id) {
            return response()->json($poll->where('id', $poll->id)->with('questions')->first());
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        if (auth()->id() != $request->user_id) {
            $status = false;
        } else {
            $status = $poll->update(
                $request->only(['title', 'details'])
            );
        }

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Poll updated successfully!' : 'Error updating poll!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $status = $poll->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Poll deleted successfully!' : 'Error deleting poll!'
        ]);
    }
}
