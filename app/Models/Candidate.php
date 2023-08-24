<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'surname', 'created_at', 'updated_at', 'parent_id', 'class_id', ];
}
