<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Thêm cột user_id với giá trị mặc định là null
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('receiver_phone');
        });
    }

    public function down(): void
    {
        // Xóa cột user_id
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};

