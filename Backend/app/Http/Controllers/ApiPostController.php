<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ApiPostController extends Controller
{
    /**
     * Return all posts as JSON.
     */
    public function index(): JsonResponse
    {
        $posts = Post::latest()->get();
        return response()->json($posts);
    }

    /**
     * Return a single post as JSON.
     */
    public function show(Post $post): JsonResponse
    {
        return response()->json($post);
    }

    /**
     * Create a new post and return it as JSON.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::create($validated);

        return response()->json($post, 201);
    }

    /**
     * Update an existing post and return it as JSON.
     */
    public function update(Request $request, Post $post): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post->update($validated);

        return response()->json($post);
    }

    /**
     * Delete a post.
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
