<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'category_name',
        'category_desc',
        'category_image',
    ];

    public function subcategory()
    {
        return $this->hasMany(Subcategory::class, 'category_id');
    }
}
