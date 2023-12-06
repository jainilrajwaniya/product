<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Entity for product table
 */
class ProductImages extends Model
{
    /**
     * Table name
     */
    protected $table = 'product_images';
    
    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = ['product_id', 'image'];
}
