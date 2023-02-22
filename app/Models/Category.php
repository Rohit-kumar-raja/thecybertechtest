<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\ChildCategory;

class Category extends Model
{
    use HasFactory;

    function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }
    function childcategory()
    {
        return $this->hasManyThrough(ChildCategory::class,SubCategory::class,);
    }
}
