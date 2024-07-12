<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;


#[ObservedBy([CategoryObserver::class])]

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug'];
}
