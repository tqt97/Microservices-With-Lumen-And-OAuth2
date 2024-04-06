<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

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
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|max:255',
        ];

        $this->validate($request, $rules);
        $author = Author::create($request->all());

        return $this->success($author, Response::HTTP_CREATED);
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
