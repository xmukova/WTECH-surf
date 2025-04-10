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
                    <img src="images/products/surfboard_darkgreen.jpg" alt="Dark green surfboard" class="carousel_photo1">
                    <img src="images/products/detail_side_green.jpg" alt="Dark green surfboard from the side" class="carousel_photo">
                    <img src="images/products/detail_green_tail.jpg" alt="Dark green surfboard close up detail" class="carousel_photo">
                    <img src="images/products/detail_green.jpg" alt="Dark green surfboard from the back" class="carousel_photo2">
                </div>
                <!-- Navigation icons -->
                <i class="bi bi-chevron-left carousel-prev" id="carousel-prev"></i>
                <i class="bi bi-chevron-right carousel-next" id="carousel-next"></i>
            </div>
        </div>
        <div class="product_description">
            <div class="product_name">Forest Green Surfboard</div>
            <div class="stars">
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-fill star"></i>
                <i class="bi bi-star-half star"></i>
                <p class="reviews">Reviews</p>
            </div>
            <div class="short_description">
                Ride the waves with style and confidence on our premium Forest Green Surfboard.
                Designed to provide exceptional performance and durability, this board is perfect for surfers
                of all levels. Whether you're a <strong>beginner</strong> looking to catch your first wave or an
                <strong>experienced surfer</strong> pushing the limits of your skills, the Forest Green Surfboard
                is engineered to meet your needs.
                <br><br>Crafted with top-tier materials, it combines a <strong>lightweight</strong> yet sturdy construction with a sleek,
                eye-catching dark forest green finish that will turn heads wherever you ride. Its expertly designed shape ensures
                <strong>stability, control, and speed</strong>, giving you the confidence to tackle any wave with ease.
                The smooth surface helps reduce drag, allowing for faster, more responsive rides, while its forgiving design
                offers added buoyancy for an easy paddling experience.
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
                <p>1270,0$</p>
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
                            <li> High-quality dark forest green finish</li>
                            <li> Ideal for both beginners and experienced surfers</li>
                            <li> Premium craftsmanship and durability</li>
                            <li> Lightweight and easy to handle</li>
                        </ul>
                    </div>
                </div>
                <!-- DESCRIPTION -->
                <div class="detail-block">
                    <input type="checkbox" id="dropdown-toggle-2" class="dropdown-toggle">
                    <label for="dropdown-toggle-2" class="dropdown-btn">Description <i class="bi bi-chevron-down"></i></label>
                    <div class="dropdown-content">
                        <p>Built to withstand the harshest ocean conditions, the Forest Green Surfboard features a durable
                        fiberglass exterior that enhances its strength while remaining lightweight. Whether you're carving sharp turns or gliding
                        effortlessly across the water, this board offers the ideal balance of performance and comfort.
                        Designed with versatility in mind, the Forest Green Surfboard excels in various wave types, making it the perfect
                        choice for surfers who love to explore different surf conditions. Plus, its stylish dark green color makes a statement in the lineup, ensuring you stand out while you ride.
                        Elevate your surfing experience today and take your wave riding to the next level with the Forest Green Surfboard – your ultimate companion in the water.</p>
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
@endsection