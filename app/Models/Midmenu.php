<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Midmenu extends Model
{
    use HasFactory;

    protected $fillable = ['title_en', 'title_fr', 'link', 'item_order', 'id'];
}
