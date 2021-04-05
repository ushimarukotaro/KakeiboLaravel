<?php

namespace Database\Seeders;


use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        static $categories = [
            1 => '趣味',
            2 => '食費',
            3 => '光熱費',
            4 => '家賃・ローン',
            5 => '交際費',
            6 => '教育費',
            7 => '給料',
            8 => '副業',
            9 => '臨時収入',
        ];
        // $categories = ['光熱費', '家賃', '給料', '副業', '雑費', '食費'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
