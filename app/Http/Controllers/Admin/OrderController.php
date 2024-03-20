<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Main\Services\OrderService;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;


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


    public function placeOrder(Request $request)
    {
        $user = auth()->user(); // Lấy thông tin người dùng đã đăng nhập
        
        // Bắt đầu Transaction
        DB::beginTransaction();
        try {
            // Tạo đơn hàng mới
            $order = new Order();
            $order->customer_id = $user->id;
            $order->order_date = now();
            $order->total_price = 0; // Cập nhật sau
            $order->status = 'pending';
            $order->purchase_date = now();
            $order->purchase_place = $request->purchase_place; // Hoặc một giá trị cố định nếu cần
            $order->staff_id = null; // Đặt null hoặc giá trị tương ứng nếu cần
            $order->save();

            $totalPrice = 0;
            $carts = Cart::where('user_id', $user->id)->get();
            foreach ($carts as $cart) {
                $totalPrice += $cart->product->price * $cart->quantity;
                OrderDetail::create([
                    'order_id' => $order->id,
                    'prod_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                ]);

                // Xóa mục trong giỏ hàng
                $cart->delete();
            }

            // Cập nhật tổng giá đơn hàng
            $order->total_price = $totalPrice;
            $order->save();

            DB::commit();
            return response()->json(['message' => 'Order placed successfully.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Order placement failed.'], 500);
        }
    }
}
