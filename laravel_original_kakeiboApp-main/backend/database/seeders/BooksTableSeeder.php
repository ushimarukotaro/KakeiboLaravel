<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::create([
            'user_id' => 1,
            // 'category_id' => 1,
            'content' => '出演費',
            'year' => 2021,
            'month' => 3,
            'date' => 12,
            'inout' => 1,
            'amount' => 30000,
            'memo' => 'これを最低にしたい',
            'delflag' => 0,
            ]);
        Book::create([
            'user_id' => 2,
            // 'category_id' => 2,
            'content' => '電気代',
            'year' => 2021,
            'month' => 3,
            'date' => 24,
            'inout' => 2,
            'amount' => 8000,
            'memo' => 'ちょっと使いすぎた',
            // 'delflag' => 0,
            ]);
        Book::create([
            'user_id' => 1,
            // 'category_id' => 1,
            'content' => '衣装代',
            'year' => 2021,
            'month' => 1,
            'date' => 13,
            'inout' => 2,
            'amount' => 12000,
            // 'delflag' => 0,
            ]);
    }
}
