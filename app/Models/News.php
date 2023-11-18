<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'content', 'image', 'published_at'
    ];

    // Các phương thức và tùy chọn khác
}
