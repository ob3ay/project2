<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use function PHPUnit\Framework\isString;

class Post extends Model
{
    //
    use HasFactory;
    protected $guarded = [];
    // protected function casts(): array
    // {
    //     return [
    //         'title' => 'array',
    //     ];
    // }
    // protected $casts = [
    //     'title' => 'array'
    // ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
    function tags()
    {

        return $this->belongsToMany(Tag::class);
    }
    function images()
    {

        return $this->morphMany(Image::class, 'imageable');
    }
    // protected $casts = [
    //     'title' => 'array', // يتحول تلقائيًا إلى مصفوفة عند قراءته
    // ];
    function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    function getMainImageAttribute()
    {
        return $this->images()->where('type', 'main')->first()->path;
    }
    function getGalleryAttribute()
    {
        return $this->images()->where('type', 'gallery')->get();
    }
}
