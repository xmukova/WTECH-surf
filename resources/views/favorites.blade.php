@extends('layouts.app')

@section('title', 'Favorites')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favorites.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Your Favorite Products</h2>
        <div class="row g-4">
    </div>

    <div class="store-name text-center overlay-text">
        <a href="{{ route('homepage') }}" aria-label="Homepage">
            Maui Surf
        </a>
    </div>


    <div class="container my-4">
        <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">
                            <img src="/images/products/dark_blue_surfboard.jpg" alt="Favorite product picture" >
                        </a>
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka" onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill "></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>   
                    </div>   
                </a>         
            </div> 

            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">
                            <img src="images/products/surfboard_green.jpg" alt="Favorite product picture" >
                        </a>
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka " onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>  
                    </div>           
            </div>

            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">
                            <img src="images/products/cap.jpg" alt="Favorite product picture" >
                        </a>
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka " onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>  
                    </div>         
            </div>


            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">
                            <img src="images/products/neopren.jpg" alt="Favorite product picture" >
                        </a>
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka " onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>  
                    </div>       
            </div>

            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">
                            <img src="images/products/black_shirt.jpg" alt="Favorite product picture" >
                        </a>
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka " onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>  
                    </div>          
            </div>

            <div class="col">
                    <div class="card darker">
                        <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Show details">   
                            <img src="images/products/leash.jpg" alt="Favorite product picture" >
                        </a> 
                        <div class = "produkt-ikonky">
                            <button class="button-ikonka " onclick="deletePhoto(this)" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to your shopping bag">
                                <i class="bi bi-bag" ></i>
                            </button>
                        </div>
                        <a href="{{ route('product_detail') }}" class="link" aria-label="Show details">
                            <div class="text-center">
                                <h5 class="text_produkt">Wave Rider Pro</h5>
                                <p class="text_cena">$1299.99</p>
                            </div>
                        </a>  
                    </div>   
            </div>

        </div>
    </div>
@endsection