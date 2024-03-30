<?php 

namespace App\Main\Services;

use App\Main\Repositories\CartRepository;
use Illuminate\Support\Facades\DB;

class CartService
{
    protected $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Lấy thông tin giỏ hàng của người dùng dựa trên session_id.
     *
     * @param string $sessionId
     * @return mixed
     */
    public function getCartBySessionId($sessionId)
    {
        return $this->cartRepository->findBySessionId($sessionId);
    }

    /**
     * Thêm sản phẩm vào giỏ hàng hoặc cập nhật số lượng nếu sản phẩm đã tồn tại dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @param int $quantity
     * @return mixed
     */
    public function addToCart($sessionId, $productId, $quantity)
    {
        return DB::transaction(function () use ($sessionId, $productId, $quantity) {
            return $this->cartRepository->addToCart($sessionId, $productId, $quantity);
        });
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @param int $quantity
     * @return mixed
     */
    public function updateCartQuantity($sessionId, $productId, $quantity)
    {
        return DB::transaction(function () use ($sessionId, $productId, $quantity) {
            return $this->cartRepository->updateCartQuantity($sessionId, $productId, $quantity);
        });
    }

    /**
     * Xoá một sản phẩm khỏi giỏ hàng dựa trên session_id.
     *
     * @param string $sessionId
     * @param int $productId
     * @return mixed
     */
    public function removeItemFromCart($sessionId, $productId)
    {
        return $this->cartRepository->removeItemFromCart($sessionId, $productId);
    }

    /**
     * Tính tổng giá trị giỏ hàng của một session.
     *
     * @param string $sessionId
     * @return float
     */
    public function calculateCartTotal($sessionId)
    {
        return $this->cartRepository->getCartTotal($sessionId);
    }
}
