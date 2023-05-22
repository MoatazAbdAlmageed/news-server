<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'author',
        'title',
        'description',
        'url',
        'content',
        'source',
        'country',
        'lang',
        'category',
        'urlToImage',
        'publishedAt',
    ];

}
