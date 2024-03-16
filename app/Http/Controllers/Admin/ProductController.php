<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Main\Services\ProductService;
use App\Http\Resources\Product as ProductResource;
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
        $products = $this->productService->getAllProducts();
        return ProductResource::collection($products);
    }

    public function show($id)
    {
        $product = $this->productService->getProductById($id);
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = $this->productService->createProduct($request->all());
        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);
        return response()->json(null, 204);
    }
}
