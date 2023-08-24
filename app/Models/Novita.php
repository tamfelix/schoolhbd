<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novita extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title_en', 'title_fr', 'content_en', 'content_fr', 'photo', 'likes', 'views', 'created_at'];
}
