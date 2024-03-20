<?php

namespace App\Main\Services;

use App\Models\Product;
use App\Main\Helpers\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductService
{
    public function getAllProducts()
    {
        try {
            $products = Product::all();
            $response = new Response();
            return $response->responseJsonSuccess($products, 'Products retrieved successfully');
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to retrieve products');
        }
    }

    public function getProductById($id)
    {
        try {
            $product = Product::findOrFail($id);
            $response = new Response();
            return $response->responseJsonSuccess($product, 'Product retrieved successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to retrieve product');
        }
    }

    public function createProduct($data)
    {
        try {
            $product = Product::create($data);
            $response = new Response();
            return $response->responseJsonSuccess($product, 'Product created successfully');
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to create product');
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($data);
            $response = new Response();
            return $response->responseJsonSuccess($product, 'Product updated successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to update product');
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            $response = new Response();
            return $response->responseJsonSuccess(null, 'Product deleted successfully');
        } catch (ModelNotFoundException $e) {
            $response = new Response();
            return $response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            $response = new Response();
            return $response->responseJsonFail('Failed to delete product');
        }
    }
}
