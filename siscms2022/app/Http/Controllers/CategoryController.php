<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryPostRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store( CategoryPostRequest $request )
    {
        $category = Category::create($request->all());
        return response()->json([
            'message'=>"Registro guardado satisfactoriamente",
            'category'=>$category,
        ], 200);
    }

    public function update( CategoryPostRequest $request, Category $category )
    {
        $category -> update($request->all());
        return response()->json([
            'message'=>"Registro actualizado satisfactoriamente",
            'category'=>$category,
        ], 200);
    }

    public function destroy( Category $category )
    {
        $category -> delete();
        return response()->json([
            'message'=>"Registro eliminado satisfactoriamente",
        ], 200);
    }
}
