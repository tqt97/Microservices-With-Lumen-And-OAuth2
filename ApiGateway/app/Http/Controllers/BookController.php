<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponse;

    public BookService $bookService;

    public AuthorService $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->success($this->bookService->getAll());
    }

    public function store(Request $request)
    {
        $this->authorService->getById($request->author_id);
        $book = $this->bookService->create($request->all());
        return $this->success($book, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $book = $this->bookService->getById($id);
        return $this->success($book);
    }

    public function update(Request $request, int $id)
    {
        $book = $this->bookService->update($request->all(), $id);
        return $this->success($book);
    }

    public function destroy(int $id)
    {
        $book = $this->bookService->delete($id);
        return $this->success($book);
    }
}
