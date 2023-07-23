<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable=['title','publisher','price','edition','publication_year','book_file','demo_file','image','caption'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }    
}
