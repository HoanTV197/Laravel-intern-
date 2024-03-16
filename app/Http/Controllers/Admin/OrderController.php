<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Main\Services\OrderService;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return response()->json($orders);
    }

    public function show($id)
    {
        $order = $this->orderService->getOrderById($id);
        return response()->json($order);
    }

    public function updateStatus(Request $request, $id)
    {
        if ($this->orderService->updateOrderStatus($id, $request->status)) {
            return response()->json(['message' => 'Đơn hàng đã được cập nhật trạng thái.'], 200);
        }
        return response()->json(['message' => 'Cập nhật đơn hàng không thành công.'], 400);
    }
}
