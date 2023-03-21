<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends ApiResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = Post::
        join('categories', 'categories.id', '=', 'posts.category_id')->
        leftJoin('post_images', 'post_images.post_id', '=', 'posts.id')->
        select([
            'posts.id as post_id',
            'posts.content',
            'posts.posted',
            'categories.id as category_id',
            'posts.title as post_title',
            'categories.title as category_title',
            'post_images.image'
        ])->
        orderBy('posts.created_at', 'desc')->paginate(10);
        return $this->apiResponse($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return JsonResponse
     */
    public function show(Post $post): JsonResponse
    {
        $post->post_images;
        $post->category;
        return $this->apiResponse($post);
    }

    /**
     * Display the specified resource.
     *
     * @param string $url_clean
     * @return JsonResponse
     */
    public function url_clean(string $url_clean): JsonResponse
    {
        $post = Post::where('url_clean', $url_clean)->firstOrFail();
        $post->post_images;
        $post->category;
        return $this->apiResponse($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function category(Category $category): JsonResponse
    {
        return $this->apiResponse($category->posts()->paginate(10));
    }
}
