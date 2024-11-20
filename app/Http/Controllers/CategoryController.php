<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::paginate(3);
        return view('admin.category.index',['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.category.addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $category = Category::find($id);

       return view('admin.category.editCategory',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(Product::where('category_id',$category->id)->count() == 0) {
            $category->delete();
            return redirect()->route('admin.category.index');

        }
        return 'Danh mục đang có sản phẩm, không xóa được!';
        
    }
}
