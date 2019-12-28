<?php

namespace App\Http\Controllers;

use App\Poll;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create([
            'question' => $request->question,
            'poll_id' => $request->poll_id
        ]);

        return response()->json([
            'status' => (bool) $question,
            'data' => $question,
            'message' => $question ? 'Question added successfully!' : 'Error adding question!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return response()->json($question->where('id', $question->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        if (auth()->id() != $request->user_id) {
            $status = false;
        } else {
            $status = $question->update(
                $request->only(['quesetion'])
            );
        }

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Question updated successfully!' : 'Error updating question!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $status = $question->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Question deleted successfully!' : 'Error deleting question!'
        ]);
    }
}
