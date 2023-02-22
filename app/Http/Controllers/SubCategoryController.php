<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class SubCategoryController extends Controller
{
    public function index()
    {
        return response()->json(SubCategory::all());
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
                SubCategory::insert([
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
    public function show(SubCategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return response()->json(SubCategory::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subcategory)
    {

        $category = Category::where('name', $request->category)->first();
        if ($category != '') {
            try {
                SubCategory::where('id', $subcategory)->update([
                    'name' => $request->name,
                    'category_id' => $category->id,

                ]);
                return response()->json("Successfully Data Updated");
            } catch (Exception $e) {
                return response()->json("Somthing Went Wrong");
            }
        } else {
            return response()->json("Category Not Fond In our Records");
        }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($subcategory)
    {
        return   SubCategory::destroy($subcategory);
    }
}
