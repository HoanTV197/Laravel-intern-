<?php

namespace App\Main\Repositories;

use App\Models\Cart;
use App\Main\BaseResponse\BaseRepository;

class CartRepository extends BaseRepository
{
    /**
     * Lấy model tương ứng để sử dụng trong BaseRepository.
     *
     * @return string
     */
    public function getModel()
    {
        return Cart::class;
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

    /**
     * Lấy tất cả các mục trong giỏ hàng dựa trên session_id.
     *
     * @param string $sessionId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    
     public function addToCart($userId, $productId, $quantity)
    {
        $cartItem = $this->model->where('user_id', $userId)
                                 ->where('product_id', $productId)
                                 ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            $cartItem = $this->model->create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
        }

        return $cartItem;
    }

    public function updateCartItem($userId, $productId, $quantity)
    {
        $cartItem = $this->model->where('user_id', $userId)
                                 ->where('product_id', $productId)
                                 ->firstOrFail();

        $cartItem->quantity = $quantity;
        $cartItem->save();

        return $cartItem;
    }

    public function removeFromCart($userId, $productId)
    {
        return $this->model->where('user_id', $userId)
                           ->where('product_id', $productId)
                           ->delete();
    }

    public function clearCart($userId)
    {
        return $this->model->where('user_id', $userId)->delete();
    }

    public function getUserCart($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
   
}
