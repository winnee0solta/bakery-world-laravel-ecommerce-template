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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body>
    <div id="wrapper">


        <!-- {{-- Main Navigation --}} -->
        @include('website.partials.nav')
        <!-- {{-- Main Navigation ends --}} -->
        <div style="height:50px;"></div>


 @php
            $fullname = 'no';
            $deliveryaddress = 'no';
            $phoneno = 'no';
            $extradetail = 'no';
            //get cookie
            $user_id = Cookie::get('usersessionid1');
            $user_uuid = Cookie::get('usersessionid2');
            if (!empty($user_id) && !empty($user_uuid)) {
                $cd =  \DB::table('customerdatas')->where('id', $user_id)->where('uuid', $user_uuid)->first();
                if ($cd->name != 'no') {
                    $fullname = $cd->name;
                }
                if ($cd->deliveryaddress != 'no') {
                    $deliveryaddress = $cd->deliveryaddress;
                }
                if ($cd->phone != 'no') {
                    $phoneno = $cd->phone;
                }
                if ($cd->extradetail != 'no') {
                    $extradetail = $cd->extradetail;
                }
                if (!empty($cd)) {
                    $cartcount =  \DB::table('carts')->where('customer_id', $user_id)->count();
                    $total_item_incart = $cartcount ;
                    $carts =  \DB::table('carts')->where('customer_id', $user_id)->get();


                }

            }

        @endphp
        <div class="main-container">

              <div class="wtn-grace-cart-wrapper">
                <div class="row ">
                    <!-- //details -->
                    <div class="col-xl-6  ">

                        <h4>
                            <i class="fas fa-map-marker-alt"></i>
                            Details
                        </h4>
                        <!-- //for details -->
                        <div class="wtn-grace-checkout-container">
                            <div class="wtn-grace-checkout">
                                <div class="wtn-grace-checkout--input-container">

                                    <div class="form-group">
                                        <label class="wtn-form--label">Full Name *</label><br>
                                        @if (!empty($fullname) && $fullname != 'no')
                                        <input id="wtn-grace-checkout-form-input-fullname"
                                            placeholder="eg : Rabi Bdr Thakulla" type="text"
                                            class="form-control wtn-form--input" required
                                            value="{{strtoupper($fullname)}}">
                                        @else
                                        <input id="wtn-grace-checkout-form-input-fullname"
                                            placeholder="eg : Rabi Bdr Thakulla" type="text"
                                            class="form-control wtn-form--input" required>
                                        @endif

                                    </div>


                                </div>

                                <div class="wtn-grace-checkout--input-container">

                                    <div class="form-group">
                                        <label class="wtn-form--label">Delivery Address *</label><br>
                                        @if (!empty($deliveryaddress) && $deliveryaddress != 'no')
                                        <input id="wtn-grace-checkout-form-input-deliveryaddress"
                                            value="{{strtoupper($deliveryaddress)}}"
                                            placeholder="eg: Kathmandu, Baneshwor, Devkota Chowk" type="text"
                                            class="form-control wtn-form--input" required>
                                        @else
                                        <input id="wtn-grace-checkout-form-input-deliveryaddress"
                                            placeholder="eg: Kathmandu, Baneshwor, Devkota Chowk" type="text"
                                            class="form-control wtn-form--input" required>
                                        @endif

                                    </div>


                                </div>

                                <div class="wtn-grace-checkout--input-container">

                                    <div class="form-group">
                                        <label class="wtn-form--label">Phone Number *</label><br>
                                        @if (!empty($phoneno) && $phoneno != 'no')
                                        <input id="wtn-grace-checkout-form-input-phoneno"
                                            value="{{strtoupper($phoneno)}}" placeholder="Phone Number" type="number"
                                            class="form-control wtn-form--input" required>
                                        @else
                                        <input id="wtn-grace-checkout-form-input-phoneno" placeholder="eg : 9808324021"
                                            type="number" class="form-control wtn-form--input" required>
                                        @endif

                                    </div>



                                </div>
                                <div class="wtn-grace-checkout--input-container">

                                    <div class="form-group">
                                        <label class="wtn-form--label">Extra Detail (optional)</label><br>
                                        @if (!empty($extradetail) && $extradetail != 'no')

                                        <input id="wtn-grace-checkout-form-input-extradetail"
                                            value="{{strtoupper($extradetail)}}" placeholder="eg: map coordinates"
                                            type="text" class="form-control wtn-form--input">
                                        @else
                                        <input id="wtn-grace-checkout-form-input-extradetail"
                                            placeholder="eg: map coordinates" type="text"
                                            class="form-control wtn-form--input">
                                        @endif

                                    </div>


                                </div>
                                <div class="wtn-grace-checkout--input-container">
                                    <div class="form-group">
                                        <button id="wtn-grace-place-your-order-btn"
                                            class="form-control wtn-form--submit"> Place Your Order</button>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <!-- //order placed -->
                        <div class="wtn-grace-orderplaced-container" style="display:none;">
                            <div class="wtn-grace-orderplaced">
                                <h4>

                                    Your order has been placed
                                </h4>
                                <p>
                                    We will contact you as soon as possible for further information.
                                </p>
                                <h4>

                                    Thank You !!
                                </h4>

                            </div>
                        </div>
                    </div>



                    <div class="col-xl-6 ">
                        <h4>
                            <i class="fas fa-money-bill"></i>
                            Payment
                        </h4>
                        <div class="wtn-grace-payment-container">
                            <div class="wtn-grace-payment">

                                <h4>

                                    Payment information
                                    <i class="fas fa-truck"></i>
                                </h4>
                                <p>
                                    Cash on delivery inside valley.
                                </p>
                                <p>
                                    Shipping cost depends on shipment location.
                                </p>
                                <p>
                                   For Outside valley deliveries we accept payment through Esewa and Bank deposit.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



        <!--  Footer  section -->
        @include('website.partials.footer')

    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>

      <script type="text/javascript">
        $(document).ready(function () {

            $('#wtn-grace-place-your-order-btn').on('click', function () {

                //get item count in cart
                var cartcount = parseInt({{$total_item_incart}});
                if (cartcount == 0) {
                    $.alert('Empty Cart');
                    return;

                }

                var data_fullname = $('#wtn-grace-checkout-form-input-fullname').val();
                var data_deliveryaddress = $('#wtn-grace-checkout-form-input-deliveryaddress').val();
                var data_phoneno = $('#wtn-grace-checkout-form-input-phoneno').val();
                var data_extradetail = $('#wtn-grace-checkout-form-input-extradetail').val();

                if (data_fullname == '') {
                    $.alert('Full Name Required!');
                    return;
                }
                if (data_deliveryaddress == '') {
                    $.alert('Delivery Address Required!');
                    return;
                }
                if (data_phoneno == '') {
                    $.alert('Phone No Required!');
                    return;
                }
                if (data_extradetail == '') {
                    data_extradetail = 'no';
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'post',
                    url: '/to-checkout',
                    data: {
                        'data_fullname': data_fullname,
                        'data_deliveryaddress': data_deliveryaddress,
                        'data_phoneno': data_phoneno,
                        'data_extradetail': data_extradetail,
                    },
                    success: function (data) {
                        console.log("ok");

                        if (data.status == 200) {
                            //hide
                            $('.wtn-grace-checkout-container').css('display', 'none');
                            $('.wtn-grace-orderplaced-container').css('display', 'block');
                            //show

                            $.alert('Your order is in process!');
                            //refresh page
                            setTimeout(function () {
                               window.location = "/";
                            }, 42000);
                        } else {
                            // console.log(data.message);
                            //hide popup
                            $.alert('Some Error Occured !');
                        }

                    },
                    error: function () {
                        $.alert('Some Error Occured !');
                    }
                });

            });
        });

    </script>


</body>

</html>
