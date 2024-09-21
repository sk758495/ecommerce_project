<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

use function Pest\Laravel\get;

class HomeController extends Controller
{
    public function index() {
        $userCount = User::where('usertype', 'user')->count();

        $product = Product :: all()->count();

        $order = Order :: all()->count();

        $delivered = Order ::where('status','Deleverd')->get()->count();

        return view('admin.index', compact('userCount','product','order','delivered'));
    }


    public function home(){
        $product = Product::all();

        if(Auth::id())
        {
        $user  = Auth::user();

        $userid = $user -> id;

        $count = Cart::where('user_id',$userid)->count();
        }else
        {
            $count ='';
        }

        return view('home.index',compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();

        if(Auth::id())
        {
        $user  = Auth::user();

        $userid = $user -> id;

        $count = Cart::where('user_id',$userid)->count();
        }else
        {
            $count ='';
        }

        return view('home.index',compact('product','count'));
    }

    public function product_details($id){
        $data = Product::find($id);

        if(Auth::id())
        {
        $user  = Auth::user();

        $userid = $user -> id;

        $count = Cart::where('user_id',$userid)->count();
        }else
        {
            $count ='';
        }

        return view('home.product_details',compact('data','count'));
    }

    public function add_cart($id){

        $product_id = $id;

        $user = Auth::User();

        $user_id = $user->id;

        $data = new Cart;

        $data->user_id = $user_id;

        $data->product_id = $product_id;

        $data->save();

        return redirect()->back()->with('success', 'Product added to the cart Successfully');
    }


    public function mycart()
    {
        if(Auth::id())
        {

        $user  = Auth::user();

        $userid = $user -> id;

        $count = Cart::where('user_id',$userid)->count();

        $cart = Cart::where('user_id',$userid)->get();

    }

        return view('home.mycart',compact('count','cart'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);


        $data->delete();

        return redirect()->back()->with('success', 'Cart Remove Successfully');
    }

    public function confirm_order(Request $request)
    {
        $name = $request -> name;

        $address = $request -> address;

        $phone = $request -> phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts){


            $order = new Order;

            $order -> product_id = $carts->product_id;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order -> user_id = $userid;

            $order->save();

        }

        // Remove items from the cart
        Cart::where('user_id', $userid)->delete();

        return redirect()->back()->with('success', 'Order Received Successfully');
    }

    public function myorders()
    {
        if(Auth::id())
        {
        $user  = Auth::user()-> id;

        $count = Cart::where('user_id',$user)->get()->count();

        $order = Order::where('user_id',$user)->get();

        return view('home.myorders',compact('count','order'));
    }

}

public function importexport()
    {
        return view('home.importexport'); // Ensure this view exists
    }

    public function import(Request $request)
    {
        // Validate file input
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        // Import the file
        Excel::import(new UserImport, $request->file('file'));

        // Redirect back with a success message
        return redirect()->back()->with('success', 'File imported successfully!');
    }

    public function export()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

}
