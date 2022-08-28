<?php

namespace App\Http\Controllers;

use App\Models\ReadBook;
use Illuminate\Http\Request;
use App\Models\CurrentlyReading;

class CurrentlyReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = request('user_id');

        return response()->json([
            'book' => CurrentlyReading::where(['user_id' => $userId])->where(['status' => 1])->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrentlyReading  $currentlyReading
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrentlyReading $currentlyReading)
    {
        $currentlyReading = CurrentlyReading::where(['user_id' => request('user_id')])->where(['status' => 1])->firstOrFail();

        if (request('status') === 0) {
            $currentlyReading->status = 0;
            $currentlyReading->save();

            ReadBook::create([
                'user_id' => request('user_id'),
                'book_id' => request('book_id'),
                'status' => 1
            ]);

            return response()->json($currentlyReading);
        }

        $currentlyReading->current_page = request('current_page');
        $currentlyReading->save();

        return response()->json($currentlyReading);
    }

    public function store(Request $request)
    {
        CurrentlyReading::create([
            'user_id' => $request->input('user_id'),
            'book_id' => $request->input('book_id'),
            'status' => 1
        ]);

        return response()->json([
            'success' => 'Added book to currently reading'
        ]);
    }

    public function destroy(Request $request)
    {
        CurrentlyReading::where(['user_id' => $request->input('user_id')])->where(['book_id' => $request->input('book_id')])->delete();

        return response()->json([
            'success' => 'Book was removed from currently reading'
        ]);
    }
}
