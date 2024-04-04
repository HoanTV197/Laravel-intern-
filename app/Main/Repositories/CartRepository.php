<?php

namespace App\Main\Repositories;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 
use App\Main\BaseResponse\BaseRepository;


class CartRepository extends BaseRepository
{
    /**
     * Specify Model class name
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

   
    public function getByUserId()
    {   
        $userId = Auth::id();
        return $this->model->where('user_id', $userId)->get();
    }

    public function getCartItemsByUserId()
{   
    $userId = Auth::id();
    return $this->model->where('user_id', $userId)->get();
}


    public function addToCart($data)
    {   
        $data['user_id'] = Auth::id();
        return $this->model->create($data);
    }

    
    public function updateQuantity($cartId, $quantity)
    {
        $cart = $this->model->find($cartId);
        if ($cart) {
            $cart->quantity = $quantity;
            $cart->save();
            return $cart;
        }
        return null;
    }

   
    public function removeFromCart($cartId)
    {
        $cart = $this->model->find($cartId);
        if ($cart) {
            return $cart->delete();
        }
        return false;
    }

   
    public function clearCartForUser()
    {
        $userId = Auth::id();
        return $this->model->where('user_id', $userId)->delete();
    }

  
    public function viewCartAndCalculateTotal()
    {
        $userId = Auth::id();
        $cartItems = $this->model->with('product')->where('user_id', $userId)->get();
        
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }

        return [
            'cart_items' => $cartItems,
            'total_price' => $totalPrice
        ];
    }

   
    public function submitCart()
    {   
        $userId = Auth::id();
        return DB::transaction(function () use ($userId) {
            $cartItems = $this->getByUserId();

            if ($cartItems->isEmpty()) {
                return null;
            }

            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);
                $totalPrice += $product->price * $item->quantity;
            }

            $order = new Order();
            $order->user_id = $userId;
            $order->order_date = now();
            $order->total_price = $totalPrice;
            $order->status = 'pending';
            $order->save();

            // Clear the cart after placing the order
            $this->clearCartForUser();

            return $order;
        });
    }
}