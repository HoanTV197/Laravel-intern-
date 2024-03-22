<?php

namespace App\Main\Services;

use App\Models\Category;
use App\Main\Helpers\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }

    public function getAllCategories()
    {
        try {
            $categories = Category::all();
            return $this->response->responseJsonSuccess($categories, 'Get all categories successfully');
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to retrieve categories');
        }
    }

    public function getCategoryById($id)
    {
        try {
            $category = Category::findOrFail($id);
            return $this->response->responseJsonSuccess($category, 'Get category by id successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Category not found', Response::HTTP_CODE_UNAUTHORIZED);
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to retrieve category');
        }
    }

    public function createCategory($data)
    {
        try {
            $category = Category::create($data);
            return $this->response->responseJsonSuccess($category, 'Category created successfully');
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to create category');
        }
    }

    public function updateCategory($id, $data)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($data);
            return $this->response->responseJsonSuccess($category, 'Category updated successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Category not found', 404);
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to update category');
        }
    }
    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return $this->response->responseJsonSuccess(null, 'Category deleted successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Category not found', 404);
        }
    }
    
}
