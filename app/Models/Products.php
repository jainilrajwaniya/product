<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Entity for product table
 */
class Products extends Model
{
    /**
     * Table name
     */
    protected $table = 'products';
    
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount_percentage',
        'rating',
        'stock',
        'brand',
        'category',
        'thumbnail',
        ];
}
