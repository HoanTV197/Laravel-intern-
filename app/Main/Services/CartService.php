<?php 

namespace App\Main\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartService
{
    public function calculateCartTotal($cartItems)
    {
        $totalPrice = 0;
        $detailedCartItems = [];

        foreach ($cartItems as $item) {
            $product = Product::find($item['product_id']);
            if ($product && $item['quantity'] > 0) {
                $itemPrice = $product->price * $item['quantity'];
                $totalPrice += $itemPrice;

                $detailedCartItems[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $item['quantity'],
                    'total_item_price' => $itemPrice,
                ];
            }
        }

        return [
            'total_price' => $totalPrice,
            'items' => $detailedCartItems,
        ];
    }
}
