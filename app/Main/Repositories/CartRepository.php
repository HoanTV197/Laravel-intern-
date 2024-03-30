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
    public function findBySessionId($sessionId)
    {
        return $this->model->where('session_id', $sessionId)->get();
    }

    /**
     * Thêm sản phẩm vào giỏ hàng hoặc cập nhật số lượng nếu sản phẩm đã tồn tại dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @param int $quantity
     * @return Cart
     */
    public function addToCart($sessionId, $productId, $quantity)
    {
        $cart = $this->model->where('session_id', $sessionId)
                            ->where('product_id', $productId)
                            ->first();
        
        if ($cart) {
            // Nếu sản phẩm đã có trong giỏ, cập nhật số lượng.
            $cart->quantity += $quantity;
        } else {
            // Nếu chưa có, tạo mới.
            $cart = new $this->model;
            $cart->session_id = $sessionId;
            $cart->product_id = $productId;
            $cart->quantity = $quantity;
        }
        
        $cart->save();
        return $cart;
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @param int $quantity
     * @return Cart|null
     */
    public function updateCartQuantity($sessionId, $productId, $quantity)
    {
        $cart = $this->model->where('session_id', $sessionId)
                            ->where('product_id', $productId)
                            ->first();
        if ($cart) {
            $cart->quantity = $quantity;
            $cart->save();
            return $cart;
        }
        return null;
    }

    /**
     * Xoá một sản phẩm khỏi giỏ hàng dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @return bool
     */
    public function removeItemFromCart($sessionId, $productId)
    {
        $cart = $this->model->where('session_id', $sessionId)
                            ->where('product_id', $productId)
                            ->first();
        if ($cart) {
            return $cart->delete();
        }
        return false;
    }

    /**
     * Tính tổng giá trị giỏ hàng của một session.
     *
     * @param string $sessionId
     * @return float
     */
    public function getCartTotal($sessionId)
    {
        $cartItems = $this->model->where('session_id', $sessionId)->get();
        $total = 0.0;
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->price;
        }
        return $total;
    }
}
