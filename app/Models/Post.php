<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_name', 
        'title',        
        'content',      
        'image_url',    
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
