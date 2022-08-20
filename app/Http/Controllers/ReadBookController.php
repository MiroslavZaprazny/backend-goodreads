<?php

namespace App\Http\Controllers;

use App\Models\ReadBook;
use App\Http\Requests\UpdateReadBookRequest;
use App\Models\User;

class ReadBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReadBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReadBook  $readBook
     * @return \Illuminate\Http\Response
     */
    public function edit(ReadBook $readBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReadBookRequest  $request
     * @param  \App\Models\ReadBook  $readBook
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReadBook  $readBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReadBook $readBook)
    {
        //
    }
}
