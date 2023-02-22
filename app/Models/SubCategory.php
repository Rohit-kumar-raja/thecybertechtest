<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildCategory;
class SubCategory extends Model
{
    use HasFactory;
    function childcategory()
    {
        return $this->hasMany(ChildCategory::class);
    }

}
