<?php 

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'total_cost' => $this->faker->randomFloat(2, 10, 100),
            'status' => $this->faker->randomElement(['new', 'confirm', 'shipped', 'processing', 'delivered', 'return_in_progress', 'return', 'cancel']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Order $order) {
            $order->orderItems()->saveMany(OrderItem::factory()->count(3)->make());
        });
    }
}
