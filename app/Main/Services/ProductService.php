<?php

namespace App\Main\Services;

use App\Models\Product;
use App\Main\Helpers\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ProductService
{
    private $response;

    public function __construct()
    {
        $this->response = new Response();
    }


    public function getAllProducts()
    {
        try {
            $products = Product::all();
            return $this->response->responseJsonSuccess($products, 'Get all products successfully');
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to retrieve products');
        }
    }

    public function getProductById($id)
    {
        try {
            $product = Product::findOrFail($id);
            return $this->response->responseJsonSuccess($product, 'Get product by id successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to retrieve product');
        }
    }
    public function createProduct($data)
    {
        try {
            $product = Product::create($data);
            return $this->response->responseJsonSuccess($product, 'Product created successfully');
        } catch (\Exception $e) {

            return $this->response->responseJsonFail('Failed to create product');
        }
    }

    public function updateProduct($id, $data)
    {
        try {
            $product = Product::findOrFail($id);
            $product->update($data);
            return $this->response->responseJsonSuccess($product, 'Product updated successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to update product');
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return $this->response->responseJsonSuccess(null, 'Product deleted successfully');
        } catch (ModelNotFoundException $e) {
            return $this->response->responseJsonFail('Product not found', 404);
        } catch (\Exception $e) {
            return $this->response->responseJsonFail('Failed to delete product');
        }
    }
}
