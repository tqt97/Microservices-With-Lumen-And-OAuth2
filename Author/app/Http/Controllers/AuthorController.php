<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function show(int $id)
    {
        $author = Author::findOrFail($id);

        return $this->success($author);
    }

    public function update(Request $request, int $id)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|max:255',
        ];
        $author = Author::findOrFail($id);

        $this->validate($request, $rules);
        $author->fill($request->all());
        if ($author->isClean()) {
            return $this->error('Nothing to update', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        if ($author->save()) {
            return $this->success($author);
        }
        return $this->error('Something went wrong', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function destroy(int $id)
    {
        $author = Author::findOrFail($id);
        try {
            $author->delete();
            return $this->success($author->name . ' has been deleted');
        } catch (Exception $exception) {
            return $this->error('Something went wrong', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
