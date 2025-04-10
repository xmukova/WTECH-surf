@extends('layouts.app')

@section('title', 'Maui Surf')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush

@section('content')
    <!--Banner-->
    <div class="banner-container">
        <video src="images/surf images videos/surfisti_na_vlne.mp4" class="img-fluid w-100" autoplay loop muted playsinline></video>
        <div class="overlay-text">Maui Surf</div>
        <div class="banner-text">
            <div class="text_on_banner">The waves are calling - ride them in style! Find the best surf gear here.</div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder=" Search...">
            <i class="bi bi-search"></i>
        </div>
    </div>

    <div class="nav">
        <a href="{{ route('products') }}"><h2>SURFBOARDS</h2></a>
        <a href="{{ route('products') }}"><h2>EQUIPMENT</h2></a>
        <a href="{{ route('products') }}"><h2>ACCESSORIES</h2></a>
    </div>
    <!--Products-->
    <div class="products">
        <div class="product_left">
            <a href="{{ route('product_detail') }}"><img src="images/products/dark_blue_surfboard.jpg" alt="Dark Blue surfboard" class="surfboard_picture darker"></a>
            <div class="surfboard_products">
                <div class="three_products">
                    <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_darkgreen.jpg" alt="Dark green surfboard" class="surfboard_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_darkred.jpg" alt="Dark red surfboard" class="surfboard_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/surfboard_green.jpg" alt="Green surfboard" class="surfboard_product darker"></a>
                    <div class="pretty-box">
                        <p class="pretty-text">Surfboards</p>
                    </div>
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products') }}"><button class="custom-btn">More</button></a>
                </div>
            </div>
        </div>
        <div class="product_right">
            <a href="{{ route('product_detail') }}"><img src="images/products/neopren3.jpg" alt="Dark red neopren" class="equipment_picture darker"></a>
            <div class="equipment_products">
                <div class="three_products">
                    <a href="{{ route('product_detail') }}"><img src="images/products/fin.jpg" alt="White fin" class="equipment_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/leash.jpg" alt="Surfboard leash classic" class="equipment_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/leash2.jpg" alt="Surfboard leash strong" class="equipment_product darker"></a>
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products') }}"><button class="equipment-custom-btn">More</button></a>
                    <div class="pretty-box-reverse">
                        <p class="pretty-text">Equipment</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product_left">
            <a href="{{ route('product_detail') }}"><img src="images/products/black_shirt.jpg" alt="Black maui merch tshirt" class="surfboard_picture darker"></a>
            <div class="surfboard_products">
                <div class="three_products">
                    <a href="{{ route('product_detail') }}"><img src="images/products/cap.jpg" alt="Brown maui merch cap" class="surfboard_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/cap_blue.jpg" alt="Blue maui merch cap" class="surfboard_product darker"></a>
                    <a href="{{ route('product_detail') }}"><img src="images/products/cap_mctavish.jpg" alt="Green maui merch cap" class="surfboard_product darker"></a>
                    <div class="pretty-box">
                        <p class="pretty-text">Accessories</p>
                    </div>
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products') }}"><button class="custom-btn">More</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection