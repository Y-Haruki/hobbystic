<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category_names = [
            'スポーツ', 'サッカー', '野球', '読書', '水泳', 'プログラミング', '書道', 'キャンプ'
        ];

        foreach ($category_names as $category_name) {
            Category::create([
                'name' => $category_name,
                'image' => $category_name
            ]);
        }
    }
}
