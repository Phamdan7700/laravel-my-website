<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'order',
        'status',
        'created_by',
        'updated_by',
    ];

    public function typeNews()
    {
        return $this->hasMany(Type::class);
    }

    public function posts()
    {
        return $this->hasManyThrough(Post::class, Type::class)->orderBy('created_at','desc');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
