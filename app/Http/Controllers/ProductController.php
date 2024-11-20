<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $keyword = $request->input('keyword');
        $category = Category::all();
        $product = Product::where('name', 'like', "%$keyword%")
                            ->orWhere('description', 'like', "%$keyword%")
                            ->paginate(5);
        return view('admin.product.index', compact('category', 'product', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.product.addProduct',['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        $image = time().'-'.$request->image->getClientOriginalName();
        $path = public_path('uploads');
        $request->image->move($path,$image);
        
        $form_data = $request->only('name', 'price', 'sale_price', 'status', 'category_id','description','gender');
        $form_data['image'] = $image;
        if($product = Product::create($form_data)) {
            if($request->images && count($request->images)){
                foreach($request->images as $img) {
                    $image_name = time().'-'.$img->getClientOriginalName();
                    $img->move($path,$image_name);
                    ProductImage::create(['name' => $image_name, 'product_id'=> $product->id]);
                }
            }
            return redirect()->route('admin.product.index');
        }
        return redirect()->back();
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
         $category = Category::all();
        $product = Product::find($id);
        return view('admin.product.editProduct',['category' => $category],['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $form_data = $request->only('name', 'price', 'sale_price', 'status', 'category_id','description','gender');
        $path = public_path('uploads');
        if($request->image) {
            $image = time().'-'.$request->image->getClientOriginalName();
            $request->image->move($path,$image);
            $form_data['image'] = $image;
        }
        

       
        if($product->update($form_data)) {
            if($request->images && count($request->images)){
                

                foreach($product->images as $pro_img) {
                    $file_path = $path . '/'.$pro_img->name;
                    if(file_exists($file_path)) {
                        unlink($file_path); // xóa file trong thư mục
                    }
                }
                ProductImage::where('product_id', $product->id)->delete();
                foreach($request->images as $img) {
                    $image_name = time().'-'.$img->getClientOriginalName();
                    $img->move($path,$image_name);
                    ProductImage::create(['name' => $image_name, 'product_id'=> $product->id]);
                }
            }
            return redirect()->route('admin.product.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $path = public_path('uploads');
        foreach($product->images as $pro_img) {
            $file_path = $path . '/'.$pro_img->name;
            if(file_exists($file_path)) {
                unlink($file_path); // xóa file trong thư mục
            }
        }
        ProductImage::where('product_id', $product->id)->delete();

        $file_path1 = $path . '/'.$product->image;
        if(file_exists($file_path1)) {
            unlink($file_path1); // xóa file trong thư mục
        }
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
