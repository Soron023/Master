<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $fillable = array('category_id','title','author','image','price','short_desc','description');
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
