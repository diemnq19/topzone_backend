<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Thêm trường image_url
            $table->string('image_url')->nullable();

            // Thêm trường percent_discount
            $table->decimal('percent_discount', 5, 2)->nullable();

            // Thêm trường unit với giá trị mặc định là '$'
            $table->string('unit')->default('$');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('image_url');
            $table->dropColumn('percent_discount');
            $table->dropColumn('unit');
        });
    }
};
