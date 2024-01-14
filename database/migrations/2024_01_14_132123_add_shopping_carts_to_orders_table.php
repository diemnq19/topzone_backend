<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShoppingCartsToOrdersTable extends Migration
{
    public function up()
    {
        // Thêm cột shopping_carts với giá trị mặc định là null
        Schema::table('orders', function (Blueprint $table) {
            $table->json('shopping_carts')->nullable()->after('user_id');
        });
    }

    public function down()
    {
        // Xóa cột shopping_carts
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('shopping_carts');
        });
    }
}

