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
        $categories = ['光熱費', '家賃', '給料', '副業', '雑費', '食費'];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
