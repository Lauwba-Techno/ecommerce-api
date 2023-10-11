<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;

    protected $table = 'feeds';
    protected $primaryKey = 'feed_id';
    protected $fillable = [
        'feed_title',
        'feed_category',
        'feed_desc',
        'feed_image',
    ];
}
