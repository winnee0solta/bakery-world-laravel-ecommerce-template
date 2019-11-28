<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Cookie\CookieJar;
use App\BakeryItem;
use App\Order;
use App\Customerdata;
use App\Cart;
class DashboardController extends Controller
{
    public function index()
    {
        return redirect('/dashboard/products');
    }
    public function productsIndex()
    {
        $bakeryitems =  BakeryItem::all();
        return view('dashboard.products.index',compact( 'bakeryitems'));
    }
    public function productsAddView()
    {
        return view('dashboard.products.add');
    }
    public function productsAdd(Request $request)
    {
        if (Input::hasFile('image')) {
            //  upload product
            $product = BakeryItem::create([
                'image' => 'no',
                'name' => $request->name,
                'price' => $request->price,
            ]);
            $file = Input::file('image');
            $unique_id = uniqid();
            $file->move('images/products', $unique_id . '.' . $file->getClientOriginalExtension());
            $product->image = $unique_id . '.' . $file->getClientOriginalExtension();
            $product->save();

            //send mail
            Mail::send('mail.productadded', [], function ($message) {
                $message->from('shresthasaksham26@gmail.com', 'Mail Service');
                $message->to('shresthasaksham08@gmail.com', 'Shrestha Saksham ');
                $message->subject('New Product Added!');
            });

        }

        return redirect('/dashboard/products');
    }
    public function productsRemove($id)
    {

        BakeryItem::where('id',$id)->delete();
        //send mail
        Mail::send( 'mail.productremoved', [], function ($message) {
            $message->from( 'shresthasaksham26@gmail.com', 'Mail Service');
            $message->to( 'shresthasaksham08@gmail.com', 'Shrestha Saksham ');
            $message->subject('Product Removed!');
        });

        return redirect('/dashboard/products');
    }

    public function ordersIndex(){
        $orders =  Order::all();
        $datas = array();
        foreach ($orders as $order) {

            //product data
            $bakeryitem =  BakeryItem::find($order->product_id);
            //customer data

            $clientinfo = Customerdata::where('id', $order->customer_id)->first();
                    $temp_data = array(
                        'order_id' => $order->id,
                        'client_name' => $clientinfo->name,
                        'client_address' => $clientinfo->deliveryaddress,
                        'client_phone' => $clientinfo->phone,
                        'product_image' =>  $bakeryitem->image,
                        'product_name' =>  $bakeryitem->name,
                        'product_price' =>  $bakeryitem->price,
                    );

                    array_push($datas, $temp_data);
        }

        // return $datas;
        return view('dashboard.orders.index',compact('datas'));
    }
    public function orderRemove($id){

        Order::where('id',$id)->delete();
        //send mail
        Mail::send('mail.ordercompleted', [], function ($message) {
            $message->from('shresthasaksham26@gmail.com', 'Mail Service');
            $message->to('shresthasaksham08@gmail.com', 'Shrestha Saksham ');
            $message->subject('Order removed/Completed!');
        });
        return redirect('/dashboard/orders');
    }
}
