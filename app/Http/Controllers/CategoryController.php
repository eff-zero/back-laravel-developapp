<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index'); // Middleware para autentificación
        $this->middleware('role:1')->except('index'); // Middleware para administradores
    }

    /**
     * Get all categories.
     */
    public function getAllCategories()
    {
        return Category::with('products')->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getAllCategories();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        // No tiene validaciones
        Category::create($request->all());
        return response()->json($this->getAllCategories());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // No tiene valicaciones.
        $category->update($request->all());
        return response()->json($this->getAllCategories());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $newState = $category->state == 1 ? 0 : 1;
        $category->update(['state' => $newState]);
        return response()->json($this->getAllCategories());
    }
}
