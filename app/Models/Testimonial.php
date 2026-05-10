<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'customer_name',
        'role',
        'rating',
        'content',
        'image_path',
        'is_active',
    ];
}
