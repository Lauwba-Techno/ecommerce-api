<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'abouts';
    protected $primaryKey = 'about_id';
    protected $fillable = [
        'app_name',
        'app_desc',
        'contact',
    ];
}
