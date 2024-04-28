<?php

namespace App\Main\Services;

use App\Main\Repositories\OrderRepository;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class OrderService
{   
    
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAllOrders(): Collection
    {
        return Order::with('user')->get();
    }

    public function getOrderById(int $id): Order
    {
        return Order::with('user','orderDetails.product')->findOrFail($id);
    }

    public function updateOrderStatus(string $status, int $id): bool
    {
        $order = Order::find($id);
        
        if (!$order) {
            throw new ModelNotFoundException("Order not found.");
        }
        
        $order->status = $status;
        return $order->save();
    }

   
}