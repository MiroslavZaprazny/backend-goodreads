<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Review;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchInput = request('search');
        if ($searchInput >= 2) {
            $searchResults = Book::where('title', 'LIKE', '%' . $searchInput . '%')->get();
            return response()->json($searchResults);
        }
    }
}
