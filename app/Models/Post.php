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
        'created_by',
        'updated_by',
        'type_id',
        
    ];

    public function typeNews() {
        return $this->belongsTo(Type::class, 'type_id');
    }


    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function createdBy() {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updatedBy() {
        return $this->belongsTo(User::class,'updated_by');
    }
}
