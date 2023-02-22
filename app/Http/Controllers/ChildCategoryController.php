<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use Exception;
use Illuminate\Http\Request;

class ChildCategoryController extends Controller
{
    public function index()
    {
        return response()->json(ChildCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::where('name', $request->category)->first();
        if ($category != '') {
            try {
                ChildCategory::insert([
                    'name' => $request->name,
                    'category_id' => $category->id,

                ]);
                return response()->json("Successfully Data Added");
            } catch (Exception $e) {
                return response()->json("Somthing Went Wrong");
            }
        } else {
            return response()->json("Category Not Fond In our Records");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ChildCategory $childChildCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return response()->json(ChildCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChildCategory $childChildCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($childChildCategory)
    {
        ChildCategory::destroy($childChildCategory);
        return response()->json("Successfully Child Category Delete");

    }
}
