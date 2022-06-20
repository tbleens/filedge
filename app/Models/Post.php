<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'category_id', 'short_description', 'content'];

    public function scopesearchByTitle(Builder $query, $value)
    {
        return $query->where('title', 'like', '%' . $value . '%');
    }
}
