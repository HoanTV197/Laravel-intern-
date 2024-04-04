<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Main\Services\CartService;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller


{
 // Thêm sản phẩm vào giỏ hàng
 public function addToCart(Request $request) {
    $cart = new Cart();
    $cart->user_id = $request->user_id;
    $cart->product_id = $request->product_id;
    $cart->quantity = $request->quantity;
    $cart->save();

    return response()->json(['message' => 'Product added to cart successfully!']);
}

// Hiển thị giỏ hàng của người dùng
public function showCart($userId) {
    $cartItems = Cart::where('user_id', $userId)->get();
    return response()->json($cartItems);
}

// Cập nhật số lượng sản phẩm trong giỏ hàng
public function updateCart(Request $request, $cartId) {
    $cart = Cart::find($cartId);
    $cart->quantity = $request->quantity;
    $cart->save();

    return response()->json(['message' => 'Cart updated successfully!']);
}

// Xóa sản phẩm khỏi giỏ hàng
public function removeFromCart($cartId) {
    $cart = Cart::find($cartId);
    $cart->delete();

    return response()->json(['message' => 'Product removed from cart successfully!']);
}

// Xem thông tin giỏ hàng và tính toán tổng giá
public function viewCartAndCalculateTotal($userId) {
    $cartItems = Cart::with('product')->where('user_id', $userId)->get();
    
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $totalPrice += $item->product->price * $item->quantity;
    }

    return response()->json([
        'cart_items' => $cartItems,
        'total_price' => $totalPrice
    ]);
}

// Submit giỏ hàng và tạo đơn hàng
public function submitCart(Request $request) {
    $userId = $request->user_id;
    $cartItems = Cart::where('user_id', $userId)->get();
    
    $totalPrice = 0;
    foreach ($cartItems as $item) {
        $product = Product::find($item->product_id);
        $totalPrice += $product->price * $item->quantity;
    }
    
    $order = new Order();
    $order->customer_id = $userId;
    $order->order_date = now();
    $order->total_price = $totalPrice;
    $order->status = 'pending';
    $order->save();

    // Xóa giỏ hàng sau khi đặt hàng
    Cart::where('user_id', $userId)->delete();

    return response()->json(['message' => 'Order placed successfully!', 'order_id' => $order->id]);
}
}


