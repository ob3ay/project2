<?php

namespace App\Models;

use App\Observers\CourseObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CourseObserver::class])]
class Course extends Model
{
    use SoftDeletes;
    //
    // protected $fillable = [
    //     'title ',
    //     'image',
    //     'price',
    //     'category',
    //     'slug',
    //     'description'
    // ];
    protected $guarded = [];

    function scopeExpensive(Builder $builder)
    {
        return $builder->where('price', '>', 100);
    }
    function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
