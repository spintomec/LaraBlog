<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Conner\Likeable\Likeable;

class Post extends Model
{
    use HasFactory, Likeable;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::creating(function ($post) {
            $post->user()->associate(auth()->user()->id);
            $post->category()->associate(request()->category);

        });

        self::updating(function ($post) {
            $post->category()->associate(request()->category);
        });
    }

    // Un post appartient à un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // Un post appartient à une catégorie
     public function category()
     {
         return $this->belongsTo(Category::class);
     }
}
