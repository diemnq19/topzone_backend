<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Sửa user_id thành thông tin người nhận hàng
            $table->dropColumn('user_id'); // Xóa cột user_id
            $table->string('receiver_name'); // Thêm cột tên người nhận
            $table->string('receiver_phone'); // Thêm cột số điện thoại người nhận
        });
    }

    public function down(): void
    {
        // Đảm bảo rằng trong trường hợp rollback, cần xóa cả cột mới
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('receiver_name');
            $table->dropColumn('receiver_phone');
        });

        // Khôi phục cột user_id nếu cần
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
        });
    }
};
