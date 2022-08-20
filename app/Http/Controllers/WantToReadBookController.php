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
}
