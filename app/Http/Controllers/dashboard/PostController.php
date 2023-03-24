<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostPost;
use App\Http\Requests\UpdatePostPut;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\CustomUrl;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role.admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response | View
     */
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view("dashboard.post.index", ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response | View
     */
    public function create() : View
    {
        $categories = Category::get()->pluck('title', 'id');
        return view("dashboard.post.create")->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostPost $request
     * @return RedirectResponse
     */
    public function store(StorePostPost $request): RedirectResponse
    {

        $inputs = $request->validated();

        $post = Post::create($inputs);

        $image = $request->file('image');

        if(isset($image)) {
            $filename = time() . "." . $image->extension();
            $image->move(public_path('images'), $filename);
            //$path =$image->store('images');
            PostImage::create(['image'=> $filename, 'post_id'=> $post->id]);
        }

        return back()->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response | View
     */
    public function show(Post $post) : View
    {
        return view('dashboard.post.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Response | View
     */
    public function edit(Post $post): View
    {
        $categories = Category::get()->pluck('title', 'id');
        return view('dashboard.post.edit')->with(['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePostPut $request
     * @param Post $post
     * @return  RedirectResponse
     */
    public function update(UpdatePostPut $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());
        return back()->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return back()->with('success', 'Post eliminado con éxito.');
    }
}
