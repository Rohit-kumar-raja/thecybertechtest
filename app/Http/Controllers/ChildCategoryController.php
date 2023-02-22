<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
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
        if ($category == '') {
            return response()->json("Category Not Fond In our Records");
        } else {
            $subcategory = SubCategory::where('name', $request->subcategory)->where('category_id', $category->id)->first();
            if ($subcategory != '') {
                try {
                    ChildCategory::insert([
                        'name' => $request->name,
                        'sub_category_id' => $subcategory->id,
                        'created_at'=>date('Y-m-d h:m:i')

                    ]);
                    return response()->json("Successfully Data Added");
                } catch (Exception $e) {
                    return response()->json("Somthing Went Wrong");
                }
            } else {
                return response()->json("SubCategory Not Fond In our Records");
            }
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
    public function update(Request $request,  $childChildCategory)
    {
        $category = Category::where('name', $request->category)->first();
        if ($category == '') {
            return response()->json("Category Not Fond In our Records");
        } else {
            $subcategory = SubCategory::where('name', $request->subcategory)->where('category_id', $category->id)->first();
            if ($subcategory != '') {
                try {
                    ChildCategory::where('id', $childChildCategory)->update([
                        'name' => $request->name,
                        'sub_category_id' => $subcategory->id,
                        'updated_at'=>date('Y-m-d h:m:i')

                    ]);
                    return response()->json("Successfully Data Updated");
                } catch (Exception $e) {
                    return response()->json("Somthing Went Wrong");
                }
            } else {
                return response()->json("Subcategory Not Found In our Records");
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($childChildCategory)
    {
        try {
            ChildCategory::destroy($childChildCategory);
            return response()->json("Successfully Child Category Delete");
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
