<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Main\Services\ProductService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {   

        return $this->baseAction(function ()  {
            $data = $this->productService->getAllProducts();
            return $data;
        }, __("Get product success"), __("Get product error"));
    }

    public function show($id)
    {
        return $this->baseAction(function () use ($id) {
            $data = $this->productService->getProductById($id);
            return $data;
        }, __("Get product success"), __("Get product error"));
    }

    public function store(StoreProductRequest $request)
    {   
        $productData = $request->validated();
        $categories = $request->input('categories');

        return $this->baseActionTransaction(function () use ($productData, $categories) {
            $product = $this->productService->createProduct($productData);
            $product->categories()->sync($categories);
            return $product;
        }, __("Create product success"), __("Create product error"));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        return $this->baseActionTransaction(function () use ($request, $id) {
            $data = $this->productService->updateProduct($id, $request->validated());
            if ($request->has('category_ids')) {
                $this->productService->updateProductCategories($id, $request->get('category_ids'));
            }
            return $data;
        }, __("Update product success"), __("Update product error"));
    }
    

    public function destroy($id)
    {
        return $this->baseActionTransaction(function () use ($id) {
            $data = $this->productService->deleteProduct($id);
            return $data;
        }, __("Delete product success"), __("Delete product error"));
    }
}
