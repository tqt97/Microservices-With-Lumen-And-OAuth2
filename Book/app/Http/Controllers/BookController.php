<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
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
        $books = Book::all();
        return $this->success($books);
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'author_id' => 'required|integer',
        ];

        $this->validate($request, $rules);
        $book = Book::create($request->all());

        return $this->success($book, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $book = Book::findOrFail($id);

        return $this->success($book);
    }

    public function update(Request $request, int $id)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|integer',
            'author_id' => 'required|integer',
        ];
        $book = Book::findOrFail($id);

        $this->validate($request, $rules);
        $book->fill($request->all());
        if ($book->isClean()) {
            return $this->error('Nothing to update', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($book->save()) {
            return $this->success($book);
        }
        return $this->error('Something went wrong', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        try {
            $book->delete();
            return $this->success($book->title . ' has been deleted');
        } catch (Exception $exception) {
            return $this->error('Something went wrong', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
