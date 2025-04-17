@extends('layouts.app')

@section('title', 'User Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush

@section('content')
<div class="store-name text-center overlay-text">
    <a href="{{ route('homepage') }}">
        Maui Surf
    </a>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-4 order-sm-2">               
            <h2>{{ $user->name }}</h2>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="odhlasit_btn">Log out</button>
            </form>

            <button class="edit_profile_btn" >
                <i class="fas fa-edit"></i>Edit Profile
            </button>
            <button class="edit_profile_btn">Change password</button> 

            <div class="card my_card">
                    <div class="card-body">
                        <h5 class="card-title">Profile details</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> {{ $user->email }}</li>
                            <li><strong>Phone:</strong> {{ $user->phone_number }}</li>
                            <li><strong>Country:</strong> {{ $user->country }}</li>
                        </ul>
                    </div>
            </div>
                
            <div class="profil_info">
                <img src="images/surf images videos/pc1.jpg" alt="Profile image" class="profile-img mb-3">
            </div>



            <!-- <button class="odhlasit_btn">Log out</button>
            <button class="edit_profile_btn" >
                <i class="fas fa-edit"></i>Edit Profile
            </button>
            <button class="edit_profile_btn">Change password</button> 
            
            <div class="card my_card">
                    <div class="card-body">
                        <h5 class="card-title">Profile details</h5>
                        <ul class="list-unstyled">
                            <li><strong>Email:</strong> meno.priezvisko@email.com</li>
                            <li><strong>Phone:</strong> +421 987 654 321</li>
                            <li><strong>Country:</strong> Country</li>
                        </ul>
                    </div>
            </div>
                
            <div class="profil_info">
                <img src="images/surf images videos/pc1.jpg" alt="Profile image" class="profile-img mb-3">
            </div> -->
        </div>




        <!-- Historia objednávok -->
        <div class="col-sm-8">
            <div class="">
                <h3 >Your orders</h3>
                <ul class="list-group">
                    <!-- Objednávka 1 -->
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <img src="/images/products/surfboard_green.jpg" alt="Product" class="product_order_image">
                            <div>
                                <p class="order_title">Wave Rider Pro</p>
                                <p class="order_details">Size: <strong>Long 7'2''</strong> | Amount: <strong>1 pc</strong></p>
                                <p class="order_details">Prize: <strong>$1299.99</strong></p>
                            </div>
                            <span class="badge bg-success">Delivered</span>
                        </div>
                    </li>
    
                    <!-- Objednávka 2 -->
                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <img src="images/products/red_border_surfboard.jpg" alt="Product" class="product_order_image">
                            <div>
                                <p class="order_title">Wave Rider</p>
                                <p class="order_details">Size: <strong>Long 7'2''</strong> | Amount: <strong>1 pc</strong></p>
                                <p class="order_details">Prize: <strong>$849.99</strong></p>
                            </div>
                            <span class="badge bg-danger">Cancelled</span>
                        </div>
                    </li>
                    <!-- Objednávka 3 -->
                    <li class="list-group-item">
                        <div class="d-flex  align-items-center">
                            <img src="images/products/dark_blue_surfboard.jpg" alt="Product" class="product_order_image">
                            <div>
                                <p class="order_title">Blue Ocean</p>
                                <p class="order_details">Size: <strong>Long 7'2''</strong> | Amount: <strong>1 pc</strong></p>
                                <p class="order_details">Prize: <strong>$849.99</strong></p>
                            </div>
                            <span class="badge bg-warning">On the way</span>
                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="d-flex align-items-center">
                            <img src="images/products/light_blue_surfboard.jpg" alt="Product" class="product_order_image">
                            <div>
                                <p class="order_title">Pro Surf</p>
                                <p class="order_details">Size: <strong>Long 7'2''</strong> | Amount: <strong>1 pc</strong></p>
                                <p class="order_details">Prize: <strong>$1299.99</strong></p>
                            </div>
                            <span class="badge bg-success">Delivered</span>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>


    <div class="recommended">
        <p class="recommend-text">We think you will like</p>
        <div class="slider-wrapper">
            <div class="recommended-slider">
                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_darkred.jpg" alt="Dark red surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_green.jpg" alt="Green surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_whitegreen.jpg" alt="White and green surfboard" class="recommended-product darker"></a>

                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/bee_yellow_surfboard.jpg" alt="Bright Yellow surfboard" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>
                <a href="{{ route('product_detail') }}"><img src="images/products/dark_blue_surfboard.jpg" alt="Dark blue surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/light_blue_surfboard.jpg" alt="Light blue surfboard" class="recommended-product darker"></a>

                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/darkred_whiteborder_surfboard.jpg" alt="Dark red surfboard with white border" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>
                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/red_border_surfboard.jpg" alt="Red border surfboard" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>

                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_darkred.jpg" alt="Dark red surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_green.jpg" alt="Green surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_whitegreen.jpg" alt="White and green surfboard" class="recommended-product darker"></a>

                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/bee_yellow_surfboard.jpg" alt="Bright Yellow surfboard" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>
                <a href="{{ route('product_detail') }}"><img src="images/products/dark_blue_surfboard.jpg" alt="Dark blue surfboard" class="recommended-product darker"></a>
                <a href="{{ route('product_detail') }}"><img src="images/products/light_blue_surfboard.jpg" alt="Light blue surfboard" class="recommended-product darker"></a>

                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/darkred_whiteborder_surfboard.jpg" alt="Dark red surfboard with white border" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>
                <!-- NEW -->
                <div class="image-block">
                    <a href="{{ route('product_detail') }}"><img src="images/products/red_border_surfboard.jpg" alt="Red border surfboard" class="recommended-product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/new.png" alt="New Overlay" class="overlay"></a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="motivation">
    <img src="images/surf images videos/pc5.jpg" alt="Motivation Picture" class="motivation_img">
    <div class="citat">"You cant't stop the waves but you can learn to surf"</div>
</div>
@endsection