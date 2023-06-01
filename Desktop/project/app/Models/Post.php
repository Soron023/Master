<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'image', 'description', 'category_id'];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
