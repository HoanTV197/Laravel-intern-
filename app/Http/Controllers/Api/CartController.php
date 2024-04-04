<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Main\Services\CartService;
use App\Http\Requests\StoreCartItemRequest;
use App\Http\Requests\UpdateCartItemRequest;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller

{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {   
        return $this->baseAction(function() {
            $data = $this->cartService->getByUserId();
            return $data;
        }, __("Get cart success"), __("Get cart error"));
    }

    public function show()
    {
        $userId = Auth::id(); // Lấy ID của người dùng hiện tại
    
        return $this->baseAction(function() use ($userId) {
            $data = $this->cartService->getCartItemsByUserId();
            return $data;
        }, __("Get cart items success"), __("Get cart items error"));
    }
    

    public function store(StoreCartItemRequest $request)
    {       
        return $this->baseActionTransaction(function() use ($request) {
            $data = $this->cartService->addToCart($request->validated());
            return $data;
        }, __("Add to cart success"), __("Add to cart error"));
        
    }
    
    public function update(UpdateCartItemRequest $request, $id)
    {
        return $this->baseActionTransaction(function() use ($request, $id) {
            $data = $this->cartService->updateQuantity($id, $request->validated()['quantity']);
            return $data;
        }, __("Update cart item success"), __("Update cart item error"));
    }

    public function destroy($id)
    {
        return $this->baseActionTransaction(function() use ($id) {
            $data = $this->cartService->removeFromCart($id);
            return $data;
        }, __("Remove from cart success"), __("Remove from cart error"));
    }

    public function viewCartAndCalculateTotal()
    {
        return $this->baseAction(function() {
            $data = $this->cartService->viewCartAndCalculateTotal();
            return $data;
        }, __("View cart and calculate total success"), __("View cart and calculate total error"));
    }

    public function submitCart()
    {
        return $this->baseActionTransaction(function() {
            $order = $this->cartService->submitCart();
            return $order;
        }, __("Submit cart success"), __("Submit cart error"));
    }
}


