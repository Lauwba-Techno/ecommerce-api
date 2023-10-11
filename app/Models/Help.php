<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    protected $table = 'helps';
    protected $primaryKey = 'help_id';
    protected $fillable = [
        'help_name',
        'help_desc',
        'help_image',
    ];
}
