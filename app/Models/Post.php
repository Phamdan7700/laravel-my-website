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
        'create_by',
        'updated_by',
        'type_id',
        'user_id',
    ];

    public function typeNews() {
        return $this->belongsTo(Type::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function createdBy() {
        return $this->belongsTo(User::class);
    }

    public function updatedBy() {
        return $this->belongsTo(User::class);
    }
}
