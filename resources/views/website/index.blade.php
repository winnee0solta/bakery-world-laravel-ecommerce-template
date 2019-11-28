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
    <link href="https://fonts.googleapis.com/css?family=Roboto:900|Sarabun:200,400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<body>
    <div id="wrapper">


        <!-- {{-- Main Navigation --}} -->
        @include('website.partials.nav')
        <!-- {{-- Main Navigation ends --}} -->

        <!-- banner section -->
        <div class="main-banner-slider">
            <a href="">
                <div style="background-image:url(/images/bg_1.jpg)">
                </div>
            </a>
            <!-- <a href="">
                <div style="background-image:url(https://images.unsplash.com/photo-1546197001-8e388d3eafe0?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjF9)">
                </div>
            </a> -->
        </div>

        <!-- most popular creations section -->

        <div class="most-popular-creation-section">

            <div class="title">
                <div class="title-text">
                    Most popular creations
                </div>
                <div class="title-image">
                    <img class="img-fluid" src="{{asset('images/title-image.png')}}" alt="">
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-l-0 p-r-0">
                        <div class="single-popular-creation-container">
                            <div class="image-container">
                                <div class="image-val"
                                    style="background-image:url(/images/product_1.jpg);background-repeat: no-repeat;background-size: cover;">

                                </div>
                            </div>
                            <div class="title">
                                Awesome Cake
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-l-0 p-r-0">
                        <div class="single-popular-creation-container">
                            <div class="image-container">
                                <div class="image-val"
                                    style="background-image:url(/images/product_2.jpg);background-repeat: no-repeat;background-size: cover;">

                                </div>
                            </div>
                            <div class="title">
                                Creamy Muffins
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-l-0 p-r-0">
                        <div class="single-popular-creation-container">
                            <div class="image-container">
                                <div class="image-val"
                                    style="background-image:url(/images/product_3.jpg);background-repeat: no-repeat;background-size: cover;">

                                </div>
                            </div>
                            <div class="title">
                                Coffee Cookies
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- popular deals -->

        <div class="popular-deals-wrapper">
            <div class="title">
                <div class="title-text">
                    Popular Deals
                </div>
                <div class="title-image">
                    <img class="img-fluid" src="{{asset('images/title-image-2.png')}}" alt="">
                </div>
            </div>

             <div class="container">
                 <div class="row">
                     @if (!empty($bakeryitems))
                       @foreach ($bakeryitems as $data)
                           <div class="col-md-4">
                         <div class="single-popular-deals-container">
                             <div class="image-container">
                                 <img class="img-fluid" src="{{asset('images/products/'.$data['image'])}}" alt="">
                             </div>
                             <div class="single-title">
                                {{$data['name']}}
                             </div>
                             <div class="single-price">
                                 Rs. {{$data['price']}}
                             </div>
                             <div class="single-buy-button">
                                 <a href="/add-to-cart/{{$data['id']}}" class="btn">Add To Cart</a>
                             </div>
                         </div>
                     </div>
                       @endforeach
                     @endif

                 </div>
             </div>

             <!-- more -->
             <div class="more-product">
                 <a href="/shop" class="btn">More Items</a>
             </div>
        </div>


        <!--  Footer  section -->
        @include('website.partials.footer')



    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
