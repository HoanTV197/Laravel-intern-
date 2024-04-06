<?php

namespace App\Main\Services;

use App\Models\Product;
use App\Main\Helpers\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Main\Repositories\ProductRepository;



class ProductService
{
    protected $response;
    protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }
    public function createProduct($data)
    {
        $product = $this->productRepository->create($data);
        $this->attachCategories($product, $data['categories']);
        return $product;
    }

    public function attachCategories(Product $product, array $categories)
    {
        $product->categories()->sync($categories);
    }

    public function updateProduct($id, $data)
    {
        return $this->productRepository->updateOrCreate(['id' => $id], $data);
    }

    public function updateProductCategories($id, $categoryIds)
{
    return $this->productRepository->updateProductCategories($id, $categoryIds);
}


    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }
}
