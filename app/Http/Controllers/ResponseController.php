<?php

namespace App\Http\Controllers;

use App\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Response::create([
            'response' => $request->response,
            'question_id' => $request->question_id
        ]);

        return response()->json([
            'status' => (bool) $response,
            'data' => $response,
            'message' => $response ? 'Response added successfully!' : 'Error adding response!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        // question.poll is a nested with to get the poll associated with the question associated with this response
        return response()->json($response->where('id', $response->id)->with('question.poll')->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        if (auth()->id() != $request->user_id) {
            $status = false;
        } else {
            $status = $response->update(
                $request->only(['response'])
            );
        }

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Response updated successfully!' : 'Error updating response!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        $status = $response->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Response deleted successfully!' : 'Error deleting response!'
        ]);
    }
}
