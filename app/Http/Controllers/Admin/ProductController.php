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
        $perPage = 10;
        return $this->baseAction(function () use ($perPage) {
            $data = $this->productService->getAllProducts($perPage);
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
        return $this->baseActionTransaction(function () use ($request) {
            $data = $this->productService->createProduct($request->validated());
            return $data;
        }, __("Create product success"), __("Create product error"));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        return $this->baseActionTransaction(function () use ($request, $id) {
            $data = $this->productService->updateProduct($id, $request->validated());
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
