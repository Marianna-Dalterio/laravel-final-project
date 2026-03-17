<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = ["XS", "S", "M", "L", "XL", "XXL", "XXXL"];
        foreach ($sizes as $size) {
            $newSize = new Size();
            $newSize->name = $size;
            $newSize->save();
        }
    }
}
