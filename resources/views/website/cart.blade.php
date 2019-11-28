<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Bakery World</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body>
    <div id="wrapper">


        <!-- {{-- Main Navigation --}} -->
        @include('website.partials.nav')
        <!-- {{-- Main Navigation ends --}} -->
        <div style="height:50px;"></div>
        {{-- //get datas  --}}
        @php
        $subtotal = 0;
        $discount = 0;
        $total_item_incart = 0;
        $productdatas = array();
        //get cookie
        $user_id = Cookie::get('usersessionid1');
        $user_uuid = Cookie::get('usersessionid2');
        if (!empty($user_id) && !empty($user_uuid)) {
        $cd = \DB::table('customerdatas')->where('id', $user_id)->where('uuid', $user_uuid)->first();
        if (!empty($cd)) {
        $cartcount = \DB::table('carts')->where('customer_id', $user_id)->count();
        $total_item_incart = $cartcount ;
        $carts = \DB::table('carts')->where('customer_id', $user_id)->get();

        foreach ($carts as $cart) {
        //get the product details
        $pd = \DB::table('bakery_items')->where('id',$cart->product_id)->first();
        $temp_data = array(
        'product_id'=> $pd->id,
        'cart_id'=> $cart->id,
        'productname'=> $pd->name,
        'price'=> $pd->price,
        'image'=> $pd->image,
        );
        array_push($productdatas,$temp_data);
        //get price
        $subtotal = $subtotal + $pd->price;
        }
        $total = $subtotal + $discount;
        }

        }

        @endphp
        <div class="main-container">
            <div class="wtn-grace-cart-wrapper">
                <div class="row">
                    <div class="col-xl-6">
                        <h4>
                            <i class="fas fa-shopping-bag"></i>
                            BAG
                        </h4>
                        <h6>
                            {{$total_item_incart}} item
                        </h6>
                        <div class="wtn-grace-single-cart-product-container">
                            @if (!empty($productdatas))
                            @foreach ($productdatas as $productdata)
                            <div class="wtn-grace-cart-product">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-sm-4 col-6">
                                        <img src="{{  URL::asset('/images/products/'.$productdata['image'])  }}"
                                            alt="{{$productdata['productname']}}"
                                            class="img-fluid wtn-grace-cart-product--img" alt="">
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-sm-8 col-6">
                                        <p class="wtn-grace-cart-product--title">
                                            {{$productdata['productname']}}
                                        </p>
                                    <div class="wtn-grace-cart-product--price">
                                        price -
                                        Rs : {{$productdata['price']}}
                                    </div>
                                    <a href="/remove-from-cart/{{$productdata['cart_id']}}/{{$user_id}}"
                                        class="btn btn-danger wtn-grace-cart-product--remove">Remove</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>
                <div class="col-xl-4">
                    <h4>
                        <i class="fas fa-truck"></i>
                        Summary
                    </h4>
                    <div class="wtn-grace-cart-summary-container">
                        <div class="wtn-grace-cart-summary">

            <div class="wtn-grace-cart-summary--total">
                <div class="row ">
                    <div class="col-6">
                        <div class="wtn-grace-cart-summary--total-title">
                            <span>
                                Items
                            </span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="wtn-grace-cart-summary--total-value">
                            <span>
                                {{$total_item_incart}}
                            </span>
                        </div>
                    </div>
                </div>


            </div>
    <div class="wtn-grace-cart-summary--divider"></div>
    <div class="wtn-grace-cart-summary--total">
        <div class="row ">
            <div class="col-6">
                <div class="wtn-grace-cart-summary--total-title">
                    <span>
                        Total
                    </span>
                </div>
            </div>
            <div class="col-6">
                <div class="wtn-grace-cart-summary--total-value">
                    <span>
                        Rs: {{$total  }}
                    </span>
                </div>
            </div>
        </div>


    </div>

    <div class="wtn-grace-cart-summary--checkout">
        <a href="/checkout" class="btn wtn-grace-cart-summary--btn">Checkout</a>
    </div>

    </div>
    </div>
    <br><br><br>
    </div>
    </div>
    </div>

    </div>



        <!--  Footer  section -->
        @include('website.partials.footer')



    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
