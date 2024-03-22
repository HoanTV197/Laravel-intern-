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
        $productService = new ProductService();
        return $productService->getAllProducts();
    }

    public function show($id)
    {
        $productService = new ProductService();
        return $productService->getProductById($id);
    }
    
    public function store(StoreProductRequest $request)
    {
        $productService = new ProductService();
        return $productService->createProduct($request->validated());
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $productService = new ProductService();
        return $productService->updateProduct($id, $request->validated());
    }

    public function destroy($id)
{
    $productService = new ProductService();
    return $productService->deleteProduct($id);
    
}
}
