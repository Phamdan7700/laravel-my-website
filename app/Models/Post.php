<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'thumbnail',
        'content',
        'view',
        'hightlight',
        'status',
        'type_id',
        'user_id',
    ];

    public function typeNews() {
        return $this->belongsTo(Type::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
