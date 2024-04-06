<?php

namespace App\Main\Repositories;

use App\Main\BaseResponse\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function getModel()
    {
        return Product::class;
    }

    public function getAllProducts()
    {   
        $perPage = 10;
        return Product::with('categories')->paginate($perPage);
    }

    public function updateProductCategories($id, $categoryIds)
{
    $product = $this->find($id);
    if ($product) {
        $product->categories()->sync($categoryIds);
        return true;
    }
    return false;
}


    public function has(string $name)
    {
        $this->has($name);
    }

    public function get(string $name)
    {
            $this->get($name);
    }

    public function set(string $name, string $value)
    {
        $this->set($name, $value);
    }

    public function clear(string $name)
    {
    }
}
