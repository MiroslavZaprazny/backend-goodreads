<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserNoteResource;
use App\Models\Book;
use App\Models\UserNote;

class UserNoteController extends Controller
{
    public function show(Book $book, $userId)
    {
        $userNote = UserNote::where(['book_id' => $book->id])->where(['user_id' => $userId])->first();
        return new UserNoteResource($userNote);
    }
}
