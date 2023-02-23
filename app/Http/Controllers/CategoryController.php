<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Category::all());
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

        $id = Category::insertGetId($request->except('_token'));
        if ($request->file('image')) {
            Category::where('id', $id)->update(['image' => $this->insert_image($request->file('image'), 'category')]);
        }

        return response()->json("Successfully  Category Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return response()->json(Category::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $category)
    {
        Category::where('id', $category)->update($request->except('_token'));
        if ($request->file('image')) {
            $this->update_images('categories', $category, $request->file('image'), 'category');
        }
        return response()->json("Successfully  Category Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category)
    {
        Category::destroy($category);
        return response()->json("Successfully  Category Delete");
    }
}
