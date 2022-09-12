<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }



    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === null ? '/images/noimage.png' : $value,
            set: fn ($value) => $value ? explode("storage", $value)[1] : null
        );
    }

    protected function shortContent(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::words(strip_tags($attributes['content']), 3)
        );  
    }
}
