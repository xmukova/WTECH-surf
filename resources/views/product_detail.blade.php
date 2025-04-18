@extends('layouts.app')

@section('title', 'Product Detail')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/product_details.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/product_details.js') }}"></script>
@endpush

@section('content')
    <div class="specific_product">
        <div class="all_details">
            <div class="carousel_container">
                <div class="carousel_track">
                    @foreach($product->images as $index => $image)
                        @if($loop->first) 
                            <!-- For the first image, add carousel_photo1 class -->
                            <img src="{{ asset($image->image_path) }}" alt="Product image 1" class="carousel_photo1">
                        @elseif($loop->last)
                            <!-- For the last image, add carousel_photo2 class -->
                            <img src="{{ asset($image->image_path) }}" alt="Product image {{ $index + 1 }}" class="carousel_photo2">
                        @else
                            <!-- For all other images, add carousel_photo class -->
                            <img src="{{ asset($image->image_path) }}" alt="Product image {{ $index + 1 }}" class="carousel_photo">
                        @endif
                    @endforeach
                    <!-- Fallback for less than 3 images -->
                    @for($i = $product->images->count(); $i < 3; $i++)
                        @php
                            // Default fallback image
                            $fallbackImage = 'images/products/detail_green_tail.jpg'; 

                            // Check product category and update fallback image accordingly
                            if ($product->category_id === 1) {
                                $fallbackImage = 'images/products/detail_green_tail.jpg'; // Surfboard-specific fallback
                            } elseif ($product->category_id === 2) {
                                $fallbackImage = 'images/products/leash2.jpg'; // Accessory-specific fallback
                            } elseif ($product->category_id === 3) {
                                $fallbackImage = 'images/products/cap.jpg'; // Equipment-specific fallback
                            }

                            // Debug: Output the category ID and selected fallback image
                            echo "<!-- Category ID: {$product->category_id}, Fallback Image: {$fallbackImage} -->";
                        @endphp

                        <img 
                            src="{{ asset($fallbackImage) }}" 
                            alt="Fallback image" 
                            class="{{ $i == 2 ? 'carousel_photo2' : 'carousel_photo' }}">
                    @endfor


                </div>
                <!-- Navigation icons -->
                <i class="bi bi-chevron-left carousel-prev" id="carousel-prev"></i>
                <i class="bi bi-chevron-right carousel-next" id="carousel-next"></i>
            </div>
        </div>
        <div class="product_description">
            <div class="product_name">{{ $product->name }}</div>
            <div class="stars">
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-half star"></i>
                <p class="reviews">Reviews</p>
            </div>
            <div class="short_description">
                {!! nl2br(e($product->short_description)) !!}
            </div>
            <div class="dropdown">
                <div class="size_quantity">
                    <form class="size_form">
                        <select name="select_size" id="sizes">
                            <option value="S">Short &nbsp;&nbsp;5'8''</option>
                            <option value="M">Middle &nbsp;&nbsp;6'11''</option>
                            <option value="L">Long &nbsp;&nbsp;7'2''</option>
                            <option value="XL">Extra Long &nbsp;&nbsp;9'6''</option>
                        </select>
                    </form>
                    <div class="number-picker">
                        <input type="number" id="quantity" value="1" min="1">
                    </div>
                </div>
            </div>
            <div class="price">
                <p>{{ number_format($product->price, 2, ',', ' ') }}$</p>
            </div>
            <div class="fav-buy">
                <button class="fav-button"> <i class="bi bi-heart smaller" ></i></button>
                <button class="buy-button">Buy</button>
            </div>

            <div class="dropdown-features">
                <!-- FEATURES -->
                <div class="detail-block">
                    <input type="checkbox" id="dropdown-toggle-1" class="dropdown-toggle">
                    <label for="dropdown-toggle-1" class="dropdown-btn">Features <i class="bi bi-chevron-down"></i></label>
                    <div class="dropdown-content">
                        <ul>
                            @foreach($features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- DESCRIPTION -->
                <div class="detail-block">
                    <input type="checkbox" id="dropdown-toggle-2" class="dropdown-toggle">
                    <label for="dropdown-toggle-2" class="dropdown-btn">Description <i class="bi bi-chevron-down"></i></label>
                    <div class="dropdown-content">
                       <p>{{ $product->description }}</p>
                    </div>
                </div>
                <!-- DELIVERY & RETURNS -->
                <div class="detail-block">
                    <input type="checkbox" id="dropdown-toggle-3" class="dropdown-toggle">
                    <label for="dropdown-toggle-3" class="dropdown-btn">Delivery & Returns <i class="bi bi-chevron-down"></i></label>
                    <div class="dropdown-content">
                        <p><strong>Delivery:</strong> We offer fast and reliable shipping to ensure your surfboard arrives in perfect condition.
                        Orders are processed and shipped within 10 business days, with delivery times ranging from 7 to 17 business days,
                        depending on your location. You'll receive a tracking number once your order ships, so you can track it along the way.
                        We use trusted courier partners to ensure timely delivery.
                        <br><strong>Returns:</strong> We offer hassle-free returns within 40 days of receiving your order. To return a product,
                        please fill out the returns information you got in your email. The surfboard must be unused, in original condition, and securely
                        packaged. Once received, we'll process your refund or exchange.
                        <br>If you receive a damaged or defective item, contact us immediately for a replacement or refund.
                        <br><strong>Exchanges:</strong> Need a different size, color, or model? Simply reach out, and we'll assist you with your exchange.
                        <br><br>For any questions, our customer service team is happy to help at <strong>maui_surf@gmail.com</strong>.
                        </p>
                    </div>
                </div>
                <!-- REVIEWS -->
                <div class="detail-block">
                    <input type="checkbox" id="dropdown-toggle-4" class="dropdown-toggle">
                    <label for="dropdown-toggle-4" class="dropdown-btn-last">Reviews <i class="bi bi-chevron-down"></i></label>
                    <div class="dropdown-content">
                        <div class="review">
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <p><em>“Absolutely love this board!The Forest Green color looks amazing, and it rides like a dream.
                                I'm a beginner, and it's been perfect for me. It's stable, easy to paddle, and handles the waves well. Highly recommend!”</em>
                                <br>- Sarah L.</p>
                        </div>
                        <div class="review">
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <p><em>“As an experienced surfer, I'm always looking for a board that combines performance and style.
                                This one checks both boxes. It's lightweight, responsive, and the design is just gorgeous. Perfect for all types of waves!”</em>
                                <br>- Jack R.</p>
                        </div>
                        <div class="review">
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <i class="bi bi-star-fill star"></i>
                            <p><em>“Great surfboard for the price! The delivery was quick, and the board arrived in perfect condition.
                                The dark green finish is stunning and definitely stands out on the water. Only took a couple of tries to
                                get used to it, but now its my go-to board.”</em>
                                <br>- Emily T.</p>
                        </div>
                        <p class="more-reviews"><br>More Reviews</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="recommended">
        <p class="recommend-text">We think you will like</p>
        <div class="slider-wrapper">
            <div class="recommended-slider">
                @foreach($all_products as $product)
                    <div class="image-block">
                        <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                            @if ($product->mainImage)
                                <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="recommended-product darker">
                            @endif
                        </a>
                        <!-- NEW Overlay for products created in the last 24 hours -->
                        @if($product->created_at >= \Carbon\Carbon::now()->subDay())
                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                <img src="{{ asset('images/new.png') }}" alt="New Overlay" class="overlay">
                            </a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>




@endsection