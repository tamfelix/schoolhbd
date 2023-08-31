<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
        protected $fillable = ['name', 'surname', 'dob', 'parent_id', 'class_id', 'img', 'created_at', 'updated_at'];
    
    protected $casts = ['dob' => 'date'];
}
