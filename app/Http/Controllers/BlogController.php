<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::latest()->get();
    }

    public function store(Request $request)
    {
        $data = $request->only(['title', 'author', 'content']);
        $blog = Blog::create($data);
        return $blog;
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete($id);
        return response('Delete successful', 200);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'author', 'content']);
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }

    public function show($id)
    {
        return Blog::findOrFail($id);
    }
}