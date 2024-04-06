<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $authors = Author::all();
        return $this->success($authors);
    }

    public function store(Request $request)
    {
    }

    public function show(Author $author)
    {
    }

    public function update(Request $request, Author $author)
    {
    }

    public function destroy(Author $author)
    {
    }
}
