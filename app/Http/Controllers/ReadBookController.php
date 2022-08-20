<?php

namespace App\Http\Controllers;

use App\Models\ReadBook;
use App\Http\Requests\UpdateReadBookRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ReadBookController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReadBook  $readBook
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user->readBooks()->where(['status' => 1])->get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReadBook  $readBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReadBook $readBook)
    {
        $readBook->delete();

        return response()->json(ReadBook::where(['user_id' => request('user_id')])->get());
    }
}
