<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //
    function index()
    {
        //id	name	price	type	description	cadre	measure	gallery
        $products =DB::table('products')
            ->select('products.type','products.gallery','products.file_path')
            ->distinct()
            ->get();
        $arr = array();
        $i = 0;
        $arr = array();
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");
                foreach ($fil as $f) {
                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }
            }
        }

            return view('product', ['products' => $products,'files'=>$fil, 'file' => $arr]);

    }
    function detail($gallery)
    {

        $data =Product::firstWhere('gallery',$gallery);
        if ($data->type == 'tableauTriptyque') {
            $fil = Storage::allFiles("public/uploads/$data->type/$data->gallery");
            $arr = array();
            $i = 0;
            foreach ($fil as $f) {
                $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                $i++;
            }
            return view('detail',['product'=>$data,'file'=>$arr]);
        }
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('type','like','%'.$req->input('query').'%')
            ->select('products.type','products.gallery','products.file_path')
            ->distinct()
            ->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
            $product=DB::table('products')
                ->where('products.gallery',"=",$req->product_galley)
                ->where('products.measure','=',$req->measure)
                ->select('products.id')
                ->get();
            $cart= new Cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id= $product->first()->id;
            $cart->save();
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }

    }
    static function cartItem(){
        $userId=Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=Session::get('user')['id'];
        $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
        $arr = array();
        $i = 0;
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");
                foreach ($fil as $f) {
                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }

            }
        }

        return view('cartlist',['products'=>$products,'file'=>$arr]);

    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }
    function orderNow(){
        $userId=Session::get('user')['id'];
        $products= $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$userId)
            ->select('products.*','cart.id as cart_id')
            ->get();
        $arr = array();
        $i = 0;
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");

                foreach ($fil as $f) {

                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }

            }
        }

        return view('ordernow',['products'=>$products,'file'=>$arr]);
    }
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
        $allCart= Cart::where('user_id',$userId)->get();

        foreach ($allCart as $cart)
        {
            $order=new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="valide";
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        return redirect('/');
    }
    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders=DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.user_id',$userId)
            ->get();
        $arr = array();
        $i = 0;
        foreach ($orders as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");
                foreach ($fil as $f) {

                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }

            }
        }
        return view('myorders',['orders'=>$orders,'file'=>$arr]);
    }
    function adminHome(){
        return view('AdminHome');
    }
    function adCartList(){
        $products=DB::table('cart')
            ->join('products','cart.product_id','=','products.id')
            ->select('products.*','cart.id as cart_id','cart.user_id as user_id')
            ->get();
        $users=DB::table('cart')
            ->join('users','cart.user_id','=',"cart.user_id")
            ->select('users.*','cart.id as cart_id')
            ->get();
        $arr = array();
        $i = 0;
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");

                foreach ($fil as $f) {

                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }

            }
        }

        return view('adcartlist',['users'=>$users,'products'=>$products,'file'=>$arr]);
    }
    function adOrderList()
    {
        $products=DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->select('products.*','orders.id as order_id','orders.user_id as user_id')
            ->get();
        $users=DB::table('orders')
            ->join('users','orders.user_id','=',"orders.user_id")
            ->select('users.*','orders.id as order_id')
            ->get();
        $arr = array();
        $i = 0;
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");
                foreach ($fil as $f) {

                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }

            }
        }



        return view('adorderlist',['users'=>$users,'products'=>$products,'file'=>$arr]);
    }
    function adProductList()
    {
        $products =DB::table('products')
            ->select('products.type','products.gallery','products.file_path')
            ->distinct()
            ->get();
        $arr = array();
        $i = 0;
        foreach ($products as $file) {
            if ($file->type == 'tableauTriptyque') {
                $fil = Storage::allFiles("public/uploads/$file->type/$file->gallery");

                foreach ($fil as $f) {

                    $arr = Arr::add($arr, $i, Str::after($f, 'public/uploads'));
                    $i++;
                }
            }
        }
        return view('adproductlist',['products'=>$products,'file'=>$arr]);
    }
    function removeProduct($gallery)
    {
        $products=DB::table('products')
            ->select('products.id')
            ->where('products.gallery',$gallery)
            ->get();

        foreach ($products as $product)
        {
            Product::destroy($product->id);
        }
        return redirect('/admin/products');
    }
    function adProducts(){
        return view('adproducts');
    }
    function adNewProducts(Request $req)
    {
        if($req->session()->has('admin'))
        {
            //id			type		cadre	measure	gallery
            $prodct =new Product();
            $prodct->type=$req->type;
            $prodct->cadre="avec cadre";
            $prodct->measure="NULL";
            $prodct->gallery=$req->gallery;
            $prodct->save();

            return redirect('/admin/adproducts');
        }
        else
        {
            return redirect('/admin/login');
        }
    }
    function validateComm($id){
        Order::destroy($id);
        return redirect('/admin/orders');
    }
}
