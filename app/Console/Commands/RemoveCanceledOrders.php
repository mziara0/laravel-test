<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class RemoveCanceledOrders extends Command
{
    protected $signature = 'orders:remove-canceled';
    protected $description = 'Remove canceled orders from the database';

    public function handle()
    {
        $this->info('Removing canceled orders...');

        Order::where('status', 'cancel')->delete();

        $this->info('Canceled orders removed successfully.');
    }
}

