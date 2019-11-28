<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BakeryItem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Customerdata;
use App\Cart;
use App\Order;
use Illuminate\Cookie\CookieJar;

class WebsiteController extends Controller
{
    public function index(){
        $bakeryitems =  BakeryItem::get()->take(6);
        return view('website.index',compact( 'bakeryitems'));
    }
    public function shopView(){
        $bakeryitems =  BakeryItem::all();
        return view( 'website.shop', compact('bakeryitems'));
    }
    public function contactView(){
        return view('website.contact');
    }
    public function cartPageview(){
        return view('website.cart');
    }
    public function addToCart($id, CookieJar $cookieJar, Request $request){
        //check if cookie with user uuid exists
        $user_id = $request->cookie('usersessionid1'); //user id
        $user_uuid = $request->cookie('usersessionid2'); //user uuid
        if (empty($user_id) || empty($user_uuid)) {
            //create new user
            $unique_id = uniqid();
            $customerdata = Customerdata::create([
                'uuid' => $unique_id
            ]);
            //add product in cart
            Cart::create([
                'product_id' => $id,
                'customer_id' => $customerdata->id,
            ]);

            $cookieJar->queue(cookie()->forever('usersessionid1', $customerdata->id));
            $cookieJar->queue(cookie()->forever('usersessionid2', $unique_id));

            //go to view cart list ..
            return redirect('/cart');
        } else {

            $cd =  Customerdata::where('id', $user_id)->where('uuid', $user_uuid)->first();
            // add product in cart
            Cart::create([
                'product_id' => $id,
                'customer_id' => $cd->id,
            ]);

            return redirect( '/cart');
        }
    }

    public function removeFromCart($cart_id, $user_id)
    {
        //check if user exists
        //check if product exists
        if (Customerdata::where('id', $user_id)->count() > 0) {
            $cd =  Customerdata::where('id', $user_id)->first();
            if (Cart::where('id', $cart_id)->count() > 0) {
                $product = Cart::where('id', $cart_id)->first();
                $product->delete();
                return redirect('/cart');
            } else {
                return redirect('/cart');
            }
        } else {
            return redirect('/cart');
        }
    }
    public function procedeTocheckoutView()
    {

        return view('website.checkout');
    }

    public function procedeTocheckout(Request $request)
    {
        $data_fullname = request('data_fullname');
        $data_deliveryaddress = request('data_deliveryaddress');
        $data_phoneno = request('data_phoneno');
        $data_extradetail = request('data_extradetail');
        if (!empty($data_extradetail) || $data_extradetail == '') {
            $data_extradetail = 'no';
        }
        //check if cookie with user uuid exists
        $user_id = $request->cookie('usersessionid1'); //user id
        $user_uuid = $request->cookie('usersessionid2'); //user uuid
        if (empty($user_id) || empty($user_uuid)) {
            $response = array('status' => 404, 'message' => 'Some Error Occured!');
            return response($response);
        } else {

            $cd = Customerdata::where('id', $user_id)->where('uuid', $user_uuid)->first();
            $cd->name = $data_fullname;
            $cd->deliveryaddress = $data_deliveryaddress;
            $cd->phone = $data_phoneno;
            $cd->extradetail = $data_extradetail;
            $cd->save();
            //add data to orders and remove data
            //get all cart data
            $carts = Cart::where('customer_id', $user_id)->get();
            foreach ($carts as $cart) {
                $productdata = BakeryItem::where('id', $cart->product_id)->first();
                //get product detail
                // store in orders
                Order::create([
                    'customer_id' => $cd->id,
                    'product_id' => $productdata->id,
                ]);
                //remove from cart
                $cart = Cart::where('id', $cart->id)->first();
                $cart->delete();
            }

            //send mail
            Mail::send('mail.ordered', [], function ($message) {
                $message->from('shresthasaksham26@gmail.com', 'Mail Service');
                $message->to('shresthasaksham08@gmail.com', 'Shrestha Saksham ');
                $message->subject('Product Ordered!');
            });

            $response = array('status' => 200, 'message' => 'Ok !');
            return response($response);
        }
    }

}
