<?php

namespace App\Observers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CourseObserver
{
    /**
     * Handle the Course "created" event.
     */
    public function creating(Course $course): void
    {
        //
        $course->slug=Str::slug($course->title).'-'.rand(00,99);
    }

    /**
     * Handle the Course "updated" event.
     */
    public function updated(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "deleted" event.
     */
    public function deleted(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "restored" event.
     */
    public function restored(Course $course): void
    {
        //
    }

    /**
     * Handle the Course "force deleted" event.
     */
    public function forceDeleted(Course $course): void
    {
        //
        File::delete(public_path($course->image));
    }
}
