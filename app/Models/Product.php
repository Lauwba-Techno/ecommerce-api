<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'subcategory_id',
        'product_name',
        'product_desc',
        'product_stock',
        'product_price',
        'product_image',
    ];
}
