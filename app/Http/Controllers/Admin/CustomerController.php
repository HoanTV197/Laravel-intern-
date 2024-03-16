<?php

namespace App\Http\Controllers\Admin;

use App\Main\Services\CustomerService;
use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return response()->json($customers);
    }
}
