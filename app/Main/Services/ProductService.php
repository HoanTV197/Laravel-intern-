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
        return $this->productRepository->create($data);
    }

    public function updateProduct($id, $data)
    {
        return $this->productRepository->updateOrCreate(['id' => $id], $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }
}
