<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class QueriesController extends Controller
{
    public function index()
    {
        // show all orders that sold above 500 times
        $orders = Order::select('orders.*')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->groupBy('orders.id')
            ->havingRaw('COUNT(order_items.id) > 9')
            ->get();

            dump($orders);

        // get every user with 
        // 1 . all orders count and orders total sum
        // 2 . orders count for every status with order total
        $users = User::withCount('orders')
            ->withSum('orders', 'total_cost')
            ->with(['orders' => function ($query) {
                $query->select('user_id', 'status', DB::raw('COUNT(*) as count'), DB::raw('SUM(total_cost) as total'))
                    ->groupBy('user_id', 'status');
            }])->get();

            dump($users);
            
        // get top 3 sold products with orders count and total for each product
        $products = Product::select('products.*')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->orderByRaw('COUNT(order_items.id) DESC')
            ->withCount('orderItems')
            ->withSum('orderItems', 'price')
            ->limit(3)
            ->get();

            dump($products);

        // trigger is created with migration files :)
            /*  file is 2023_07_11_194808_add_trigger_reduce_quantity.php */
    }
}
