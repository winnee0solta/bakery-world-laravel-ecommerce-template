<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="/">
        Bakery World
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTopGojha" aria-controls="navbarNavAltMarkup"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTopGojha">
        <div class="navbar-nav ml-auto">
            <a href="/" class="nav-item nav-link">Home</a>
            <a href="/shop" class="nav-item nav-link">Shop</a>
            <a href="/contact" class="nav-item nav-link">Contact</a>
            <a href="/cart" class="nav-item nav-link cart-count"><i class="fas fa-shopping-cart"></i>
                @php
                    $total_item_incart = 0;
                    //get cookie
                    $user_id = Cookie::get('usersessionid1');
                    $user_uuid = Cookie::get('usersessionid2');
                    if (!empty($user_id) && !empty($user_uuid))
                    {
                        $cartcount =  \DB::table('carts')->where('customer_id', $user_id)->count();
                        $total_item_incart = $cartcount ;
                    }
                @endphp
                {{$total_item_incart}}
            </a>
        </div>
    </div>
</nav>
