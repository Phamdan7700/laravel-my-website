<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'status',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
