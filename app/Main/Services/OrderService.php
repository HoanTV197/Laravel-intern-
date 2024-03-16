<?php

namespace App\Main\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public function getAllOrders(): Collection
    {
        return Order::with(['customer'])->get();
    }

    public function getOrderById($id)
    {
        return Order::with(['customer'])->findOrFail($id);
    }

    public function updateOrderStatus(int $orderId, string $status): bool
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->status = $status;
            return $order->save();
        }
        return false;
    }
}
