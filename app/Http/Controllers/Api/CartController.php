<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Main\Helpers\Response;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(\App\Main\Services\CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function submitCart(CartRequest $request)
    {
        $cartItems = $request->items;
        $cartSummary = $this->cartService->calculateCartTotal($cartItems);

        if (count($cartSummary['items']) > 0) {
            return response()->json([
                'status' => 'success',
                'data' => $cartSummary,
                'message' => 'Cart summary calculated successfully.'
            ], );
        } else {
            return response()->json([
                'status' => 'error',
                'data' => [],
                'message' => 'No valid items in the cart.'
            ], );
        }
    }
}
