<?php

namespace App\Http\Controllers;

use App\User;
use App\Recipe;
use App\UserFavorites;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json(DB::table('polls')
            ->select('polls.*', 'users.name', 'users.username')
            ->join('users', 'users.id', '=', 'polls.user_id')
            ->where('users.username', $request->username)
            ->where('polls.active', 1)
            ->orderBy('polls.created_at', 'desc')
            ->get());
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json(Auth::user());
    }

    /**
     * Update user account.
     *
     * @param Request $request
     * @return void
     */
    public function account(Request $request)
    {
        $status = Auth::user()->update(
            $request->only(['name', 'email', 'username'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Your account was updated successfully!' : 'An error occured while updating account. Try again later.'
        ]);
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);

        $status = $user->save();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Your password was changed successfully!' : 'An error occurred while changing password. Try again later.'
        ]);
    }
}
