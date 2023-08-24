<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fee', 'amount', 'discount', 'created_at', 'updated_at' ];
}
