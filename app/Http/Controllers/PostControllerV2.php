<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostControllerV2 extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => Post::orderBy('id', 'desc')->get(),
        ]);
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'body' => ['required', 'string', 'min:10', 'max:1050'],
        ]);

        // Post::create([
        //     'title' => $request->get('title'),
        //     'body' => $request->get('body'),
        // ]);

        return response()->json([
            'message' => 'created successfully',
            'data' => Post::create($request->all()),
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'body' => ['required', 'string', 'min:10', 'max:1050'],
        ]);

        $post->update($request->all());

        return response()->json([
            'message' => 'updated successfully',
            'data' => $post,
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'message' => 'post deleted successfully',
        ]);
    }
}
