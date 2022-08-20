<?php

namespace App\Http\Controllers;

use App\Models\WantToReadBook;
use App\Http\Requests\StoreWantToReadBookRequest;
use App\Http\Requests\UpdateWantToReadBookRequest;
use App\Models\User;

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
     * @param  \App\Http\Requests\StoreWantToReadBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWantToReadBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WantToReadBook  $wantToReadBook
     * @return \Illuminate\Http\Response
     */
    public function show(WantToReadBook $wantToReadBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WantToReadBook  $wantToReadBook
     * @return \Illuminate\Http\Response
     */
    public function edit(WantToReadBook $wantToReadBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWantToReadBookRequest  $request
     * @param  \App\Models\WantToReadBook  $wantToReadBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWantToReadBookRequest $request, WantToReadBook $wantToReadBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WantToReadBook  $wantToReadBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(WantToReadBook $wantToReadBook)
    {
        //
    }
}
