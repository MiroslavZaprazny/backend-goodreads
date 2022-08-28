<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserNote;
use App\Http\Requests\StoreUserNoteRequest;
use App\Http\Resources\UserNoteResource;

class UserNoteController extends Controller
{
    public function show(Book $book, $userId)
    {
        $userNote = UserNote::where(['book_id' => $book->id])->where(['user_id' => $userId])->first();
        return new UserNoteResource($userNote);
    }

    public function store(StoreUserNoteRequest $request)
    {
        UserNote::create($request->validated());

        return response()->json([
            'status' => 'success'
        ]);
    }
}
