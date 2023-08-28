<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'class_id', 'title_fr', 'title_en', 'content_fr', 'content_en', 'img'];
}
