<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    
    protected $table = 'subcategories';
    protected $primaryKey = 'subcategory_id';
    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_desc',
        'subcategory_image',
    ];
}
