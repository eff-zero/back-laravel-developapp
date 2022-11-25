<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index'); // Middleware para autentificación
        $this->middleware('role:1')->except('index'); // Middleware para administradores
    }

    /**
     * Get all products with it categories with 
     * state equal 1 or activate.
     */
    public function getAllProducts()
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
        $products = $this->getAllProducts();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // Por ahora sin imagenes y sin validaciones
        Product::create($request->all());
        return response()->json($this->getAllProducts());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // No tiene validaciones
        $product->update($request->all());
        return response()->json($this->getAllProducts());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $newState = $product->state == 1 ? 0 : 1;
        $product->update(['state' => $newState]);
        return response()->json($this->getAllProducts());
    }
}
