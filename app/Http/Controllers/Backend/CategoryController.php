<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backend.view-categories', ['categories' => $categories]);
    }

    public function category($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $id)->get();

        return view('frontend.view-categorywiseproducts', ['category' => $category, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:25|unique:categories',
            'slug' => 'string|max:50'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect()->route('view.categories')->with('message', 'Successfully category created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.edit-category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('view.categories')->with('message', 'Successfully updated category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()->with('message', 'Successfully deleted category!');
    }
}
