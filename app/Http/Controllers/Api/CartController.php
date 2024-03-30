<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Main\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        
    }

    /**
     * Hiển thị danh sách tất cả các mục trong giỏ hàng.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sessionId = $request->session()->get('session_id', $this->generateSessionId($request));
        $cartItems = $this->cartService->getCartBySessionId($sessionId);

        return response()->json(['data' => $cartItems]);
    }

    /**
     * Thêm một sản phẩm mới vào giỏ hàng.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sessionId = $request->session()->get('session_id', $this->generateSessionId($request));
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1); 

        $cartItem = $this->cartService->addToCart($sessionId, $productId, $quantity);

        return response()->json(['message' => 'Product added to cart successfully', 'data' => $cartItem]);
    }

    /**
     * Cập nhật số lượng của một sản phẩm trong giỏ hàng.
     *
     * @param Request $request
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
        $sessionId = $request->session()->get('session_id');
        $quantity = $request->input('quantity');

        $cartItem = $this->cartService->updateCartQuantity($sessionId, $productId, $quantity);

        return response()->json(['message' => 'Cart updated successfully', 'data' => $cartItem]);
    }

    /**
     * Xóa một sản phẩm khỏi giỏ hàng.
     *
     * @param Request $request
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $productId)
    {
        $sessionId = $request->session()->get('session_id');
        $result = $this->cartService->removeItemFromCart($sessionId, $productId);

        if ($result) {
            return response()->json(['message' => 'Product removed from cart successfully']);
        }

        return response()->json(['message' => 'Failed to remove product from cart'], 400);
    }

    /**
     * Tạo hoặc lấy session_id và lưu vào session.
     *
     * @param Request $request
     * @return string
     */
    protected function generateSessionId(Request $request)
    {
        $sessionId = Session::getId(); // Lấy hoặc tạo một session_id mới
        $request->session()->put('session_id', $sessionId);

        return $sessionId;
    }
}
