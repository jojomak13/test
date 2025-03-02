<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // select * from posts order by id desc
        $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::latest()->get();

        // $posts = Post::all();

        // return $posts;

        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $posts,
        ]);
    }

    public function show($id)
    {
        // select * from posts where id = 1
        // return Post::find($id);

        $post = Post::find($id);

        if(!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        return $post;
        // select * from posts where id = 1 limit 1
        // return Post::where('id', $id)->first();
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();

        return response()->json([
            'message' => 'created successfully',
        ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->save();

        return response()->json([
            'message' => 'updated successfully',
            'data' => $post,
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(!$post) {
            return response()->json([
                'message' => 'Post not found',
            ], 404);
        }

        $post->delete();

        return response()->json([
            'message' => 'post deleted successfully',
        ]);
    }
}
