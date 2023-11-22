<?php

namespace Database\Seeders;

// BrandsTableSeeder.php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        // Tạo 5 bản ghi giả định
        Brand::factory(5)->create();
    }
}
