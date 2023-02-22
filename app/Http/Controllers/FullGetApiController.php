<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FullGetApiController extends Controller
{
    public function index()
    {
        // $full_api = Category::with('subcategory')->get();
        $full_api = Category::with('subcategory','childcategory')->get();
        return $full_api;
    }
}
