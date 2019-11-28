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

        <!-- popular deals -->
        <div class="popular-deals-wrapper">
            <div class="title">
                <div class="title-text">
                   Our Shop
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

             </div>
        </div>


        <!--  Footer  section -->
        @include('website.partials.footer')



    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
