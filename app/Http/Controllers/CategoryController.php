<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }
        return response()->json($category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->update($request->all());

        return response()->json($category, 200);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(null, 204);
    }
}
