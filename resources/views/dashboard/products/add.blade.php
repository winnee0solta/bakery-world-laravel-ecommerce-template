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
        @include('dashboard.partials.nav')


         <!-- form   -->
            <div class="wtn-product-form">
                <div class="wtn-form  _card">
                    <div class="row">
                        <div class="col-xl-12">
                            <form action="/dashboard/products/add" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                                        <div class="form-group">
                                            <label class="wtn-form--label">Product Image  </label><br>
                                            <input  name="image" type="file"
                                                class="form-control wtn-form--input" required style="border:none">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-10   col-12">
                                        <div class="form-group">
                                            <label class="wtn-form--label">Products Name</label><br>
                                            <input  name="name" type="text" class="form-control wtn-form--input" placeholder="Product Name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-4 col-md-6   col-12">
                                        <div class="form-group">
                                            <label class="wtn-form--label">Price (R.s)</label><br>
                                            <input  name="price" type="text"  class="form-control wtn-form--input" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-3 col-sm-3">

                                    </div>
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <!-- for submit button -->
                                        <div class="form-group students-data-submit ">
                                            <button type="submit" class="form-control wtn-form--submit">
                                                Add Product
                                            </button>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        <!--  Footer  section -->
        @include('dashboard.partials.footer')

    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
