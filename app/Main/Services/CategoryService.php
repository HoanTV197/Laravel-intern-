<?php

namespace App\Main\Services;

use App\Main\Helpers\Response;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryService
{
    public function getAllCategories()
    {
        try {
            $categories = Category::all();
            $response = new Response();
            return $response->responseJsonSuccess($categories, 'Categories retrieved successfully');
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to retrieve categories', Response::HTTP_CODE_SUCCESS);
        }
    }

    public function getCategoryById($id)
    {
        try {
            $category = Category::findOrFail($id);
            $response = new Response();
            return $response->responseJsonSuccess($category, 'Category retrieved successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Category not found', Response::HTTP_CODE_UNAUTHORIZED);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to retrieve category', Response::HTTP_CODE_SUCCESS);
        }
    }

    public function createCategory($data)
    {
        try {
            $category = Category::create($data);
            $response = new Response();
            return $response->responseJsonSuccess($category, 'Category created successfully');
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to create category', Response::HTTP_CODE_SUCCESS);
        }
    }

    public function updateCategory($id, $data)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($data);
            $response = new Response();
            return $response->responseJsonSuccess($category, 'Category updated successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Category not found', Response::HTTP_CODE_UNAUTHORIZED);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to update category', Response::HTTP_CODE_SUCCESS);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            $response = new Response();
            return $response->responseJsonSuccess(null, 'Category deleted successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Category not found', Response::HTTP_CODE_UNAUTHORIZED);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to delete category', Response::HTTP_CODE_SUCCESS);
        }
    }
}
