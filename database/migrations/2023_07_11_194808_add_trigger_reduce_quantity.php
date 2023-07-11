<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE TRIGGER reduce_quantity_trigger AFTER INSERT ON order_items
            FOR EACH ROW
            BEGIN
                UPDATE inventories
                SET qty = qty - NEW.qty
                WHERE product_id = NEW.product_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS reduce_quantity_trigger');
    }
};
