@extends('layouts.app')

@section('title', 'Shopping cart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/shopping_cart1.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/shopping_cart1.js') }}"></script>
@endpush

@section('content')
    <div class="cart-heading">
        <p>What's in my bag</p>
        <div class="steps">
            <p class="this-step"><i class="bi bi-1-circle"></i>.<span class="step">step</span></p>
            <p><i class="bi bi-2-circle"></i>.<span class="step">step</span></p>
            <p><i class="bi bi-3-circle"></i>.<span class="step">step</span></p>
        </div>
    </div>
    <div class="bag">
        <div class="products">
            <div class="product">
                <a href="{{ route('product_detail') }}"><img src="images/products/cap_blue.jpg" alt="Blue cap" class="cart_product darker"></a>
                <div class="description">
                    <div class="name-remove">
                        <a href="{{ route('product_detail') }}"><p class="bold name">Maui Blue Cap</p></a>
                        <div class="remove-btn">
                            <button type="button" class="btn-close" aria-label="Close"></button> 
                            <p>remove</p>
                        </div>
                    </div>
                    <div class="specifications">
                        <div class="size_quantity">
                            <form class="size_form">
                                <select name="select_size" id="sizes">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </form>
                            <div class="number-picker">
                                <input type="number" id="quantity" value="1" min="1">
                            </div>
                        </div>
                        <p class="price"><span class="bold">Price: </span>24.00$</p>
                    </div>
                </div>
            </div>
            <div class="product">
                <a href="{{ route('product_detail') }}"><img src="images/products/cap.jpg" alt="Brown cap" class="cart_product darker"></a>
                <div class="description">
                    <div class="name-remove">
                        <a href="{{ route('product_detail') }}"><p class="bold name">Maui Brown Cap</p></a>
                        <div class="remove-btn">
                                <button type="button" class="btn-close" aria-label="Close"></button> 
                                <p>remove</p>
                        </div>
                        </div>
                    <div class="specifications">
                        <div class="size_quantity">
                            <form class="size_form">
                                <select name="select_size" id="sizes">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </form>
                            <div class="number-picker">
                                <input type="number" id="quantity" value="1" min="1">
                            </div>
                        </div>
                        <p class="price"><span class="bold">Price: </span>24.00$</p>
                    </div>
                </div>
            </div>
            <div class="product">
                <a href="{{ route('product_detail') }}"><img src="images/products/black_shirt.jpg" alt="Black tshirt" class="cart_product darker"></a>
                <div class="description">
                    <div class="name-remove">
                        <a href="{{ route('product_detail') }}"><p class="bold name">Merch Shirt Black</p></a>
                        <div class="remove-btn">
                                <button type="button" class="btn-close" aria-label="Close"></button> 
                                <p>remove</p>
                        </div>
                        </div>
                    <div class="specifications">
                        <div class="size_quantity">
                            <form class="size_form">
                                <select name="select_size" id="sizes">
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </form>
                            <div class="number-picker">
                                <input type="number" id="quantity" value="1" min="1">
                            </div>
                        </div>
                        <p class="price"><span class="bold">Price: </span>35.00$</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttons">
            <div class="final-info">
                <p class="total"><span class="bold2">Total: </span>83.00$</p>
            </div>
            <a href="{{ route('products') }}"><button class="shop-button">Continue Shopping</button></a>
            <button class="checkout-button">Checkout</button>
        </div>
    </div>

    <!-- sign in overlay -->
    <div id="login-overlay" class="overlay">
        <div class="overlay-content">
            <p>Would you like to sign in?</p>
            <div class="overlay-buttons">
                <button id="sign-in-yes" class="overlay-btn">Yes</button>
                <button id="sign-in-no" class="overlay-btn">No</button>
            </div>
        </div>
    </div>
@endsection