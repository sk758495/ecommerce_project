<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();

        return redirect()->back()->with('success', 'Category Added Successfully');
    }

    public function delete_category($id){
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function edit_category($id){

        $data = Category::find($id);

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id){

        $data = Category::find($id);

        $data->category_name =$request->category;

        $data->save();

        return redirect('/view_category')->with('success', 'Category Updated Successfully');
    }

    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));

    }

    public function upload_product(Request $request){

        $data = new Product;
        $data -> title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> quantity = $request->quantity;
        $data -> category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();


        return redirect()->back()->with('success', 'Product Added Successfully');
    }

    public function view_product(){
        $product = Product::paginate(5);
        return view('admin.view_product',compact('product'));
    }

    public function delete_product($id){
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

    public function Update_product($id){

        $data = Product::find($id);

        $category = Category::all();

       return view('admin.update_product',compact('data','category'));
    }

    public function edit_product(Request $request,$id){

        $data = Product::find($id);

        $data -> title = $request->title;
        $data -> description = $request->description;
        $data -> price = $request->price;
        $data -> quantity = $request->quantity;
        $data -> category = $request->category;

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products',$imagename);

            $data->image = $imagename;
        }

        $data->save();

        return redirect('/view_product')->with('success', 'Product Updated Successfully');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title','like','%'.$search.'%')->orwhere('category','like','%'.$search.'%')->paginate(3);

        return view('admin.view_product',compact('product'));
    }

    public function view_orders(){

        $data = Order::all();
        return view('admin.orders',compact('data'));
    }

    public function on_the_way($id){

        $data = Order::find($id);

        $data ->status = 'On the way';

        $data -> save();

        return redirect()->back();
    }

    public function deleverd($id){

        $data = Order::find($id);

        $data ->status = 'Deleverd';

        $data -> save();

        return redirect()->back();
    }

    public function print_pdf($id){

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice',compact('data'));

        return $pdf->download('invoice.pdf');

    }

    






}
