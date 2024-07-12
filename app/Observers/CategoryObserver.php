<?php

namespace App\Observers;

use App\Models\category;
use App\Models\Post;

class CategoryObserver
{
    /**
     * Handle the category "created" event.
     */
    public function created(category $category): void
    {
        //
    }

    /**
     * Handle the category "updated" event.
     */
    public function updated(category $category): void
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     */
    public function deleted(category $category): void
    {
        $Post = Post::where('category_id',$category->id)->update(['category_id'=>'1']);
    }

    /**
     * Handle the category "restored" event.
     */
    public function restored(category $category): void
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     */
    public function forceDeleted(category $category): void
    {
        //
    }
}
