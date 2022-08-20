<?php

namespace App\Http\Controllers;

use App\Models\CurrentlyReading;
use App\Http\Requests\StoreCurrentlyReadingRequest;
use App\Http\Requests\UpdateCurrentlyReadingRequest;
use App\Models\User;
use Illuminate\Support\Facades\Request;

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
        $currentlyReading = CurrentlyReading::where(['user_id' => request('user_id')])->where(['status' => 1])->first();

        if (request('status') === 0) {
            $currentlyReading->status = 0;
            $currentlyReading->save();
            return response()->json($currentlyReading);
        }

        $currentlyReading->current_page = request('current_page');
        $currentlyReading->save();

        return response()->json($currentlyReading);
    }
}
