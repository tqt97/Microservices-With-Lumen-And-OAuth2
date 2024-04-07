<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthorController extends Controller
{
    use ApiResponse;

    public AuthorService $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->success($this->authorService->getAll());
    }

    public function store(Request $request)
    {
        $author = $this->authorService->create($request->all());
        return $this->success($author, Response::HTTP_CREATED);
    }

    public function show(int $id)
    {
        $author = $this->authorService->getById($id);
        return $this->success($author);
    }

    public function update(Request $request, int $id)
    {
        $author = $this->authorService->update($request->all(), $id);
        return $this->success($author);
    }

    public function destroy(int $id)
    {
        $author = $this->authorService->delete($id);
        return $this->success($author);
    }
}
