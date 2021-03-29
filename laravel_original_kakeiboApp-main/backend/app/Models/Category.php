<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
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
}
