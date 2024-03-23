<?php

namespace App\Http\Controllers\Admin;

use App\Main\Services\OrderService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $order = $this->orderService->getOrderById($id);
            return response()->json($order);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Order not found.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            if ($this->orderService->updateOrderStatus($id, $request->status)) {
                return response()->json(['message' => 'Order status has been updated.'], Response::HTTP_OK);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Order not found.'], Response::HTTP_NOT_FOUND);
        }
        
        return response()->json(['message' => 'Order update failed.']);
    }
}
