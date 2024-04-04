<?php 

namespace App\Main\Services;

use App\Main\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    public function addToCart($productId, $quantity)
    {
        $userId = Auth::id();
        return $this->cartRepository->addToCart($userId, $productId, $quantity);
    }

    public function updateCartItem($productId, $quantity)
    {
        $userId = Auth::id();
        return $this->cartRepository->updateCartItem($userId, $productId, $quantity);
    }

    public function removeFromCart($productId)
    {
        $userId = Auth::id();
        return $this->cartRepository->removeFromCart($userId, $productId);
    }

    public function clearCart()
    {
        $userId = Auth::id();
        return $this->cartRepository->clearCart($userId);
    }

    public function getUserCart()
    {
        $userId = Auth::id();
        return $this->cartRepository->getUserCart($userId);
    }
}
