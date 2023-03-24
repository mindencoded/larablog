<?php

namespace App\Http\Controllers\dashboard;

use App\CustomUrl;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryPost;
use App\Http\Requests\UpdateCategoryPut;
use App\Models\Category;;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
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
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view("dashboard.category.index", ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Response | \View
     */
    public function create(): View
    {
        return view("dashboard.category.create", ['category' => new Category()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryPost $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryPost $request): RedirectResponse
    {
        $inputs = $request->validated();

        Category::create($inputs);

        //return back()->with('success', 'Category created successfully.');
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Response | View
     */
    public function show(Category $category): View
    {
        return view('dashboard.category.show')->with(['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @return Response | View
     */
    public function edit(Category $category): View
    {
        return view('dashboard.category.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryPut $request
     * @param Category $category
     * @return  RedirectResponse
     */
    public function update(UpdateCategoryPut $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());
        //return back()->with('success', 'Category updated successfully.');
        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'The category was successfully removed.');
    }
}
