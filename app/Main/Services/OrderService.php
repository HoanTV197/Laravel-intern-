<?php

namespace App\Main\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Illuminate\Support\Facades\DB;

class OrderService
{
    public function getAllOrders(): Collection
    {
        return Order::with('customer')->get();
    }

    public function getOrderById(int $id): Order
    {
        return Order::with('customer')->findOrFail($id);
    }

    public function updateOrderStatus(int $orderId, string $status): bool
    {
        $order = Order::find($orderId);
        
        if (!$order) {
            throw new ModelNotFoundException("Order not found.");
        }
        
        $order->status = $status;
        return $order->save();
    }

    public function createOrder($cartItems, $userId)
    {
        DB::beginTransaction();
        try {
            $totalPrice = collect($cartItems)->sum('total_item_price');

            $order = Order::create([
                'total_price' => $totalPrice,
                'status' => 'pending', // Hoặc bất kỳ trạng thái mặc định nào bạn muốn
                'user_id' => $userId,
            ]);

            foreach ($cartItems as $item) {
                \App\Models\OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total_price' => $item['total_item_price'],
                ]);
            }

            DB::commit();
            return $order->load('orderDetails');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}