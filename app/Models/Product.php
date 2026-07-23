<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <--- You were missing this line
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image'];
}