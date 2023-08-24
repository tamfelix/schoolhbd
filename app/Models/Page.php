<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title_en','title_fr', 'page_order', 'link', 'content_en', 'content_fr'];
}
