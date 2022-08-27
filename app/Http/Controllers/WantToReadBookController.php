<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\WantToReadBook;

class WantToReadBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return $user->wantToReadBooks()->where(['status' => 1])->limit(4)->get();
    }

    public function show(User $user)
    {
        $wantsToRead = WantToReadBook::where(['user_id' => $user->id])->where(['book_id' => request('book_id')])->get();

        if (count($wantsToRead) === 0) {
            return response()->json(false);
        }

        return response()->json(true);
    }

    public function create(User $user)
    {
        WantToReadBook::create([
            'user_id' => $user->id,
            'book_id' => request('book_id'),
            'status' => 1
        ]);

        return response()->json('OK');
    }

    public function destroy(User $user)
    {
        $wantToReadBook = WantToReadBook::where(['user_id' => $user->id])->where(['book_id' => request('book_id')])->firstOrFail();
        $wantToReadBook->delete();

        return response()->json(['OK']);
    }
}
