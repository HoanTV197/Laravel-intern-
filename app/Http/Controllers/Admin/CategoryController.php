<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Main\Services\CategoryService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
         $categoryService = new CategoryService();
         return $categoryService->getAllCategories();
    }

    public function show($id)
    {
        $categoryService = new CategoryService();
        return $categoryService->getCategoryById($id);
    }

    public function store(StoreCategoryRequest $request)
    {       
        $categoryService = new CategoryService();
        return $categoryService->createCategory($request->validated());
        
    }
    
    public function update(UpdateCategoryRequest $request, $id)
    {
        $categoryService = new CategoryService();
        return $categoryService->updateCategory($id, $request->validated());
    }

    public function destroy($id)
    {
        $categoryService = new CategoryService();
        return $categoryService->deleteCategory($id);
    }
}
