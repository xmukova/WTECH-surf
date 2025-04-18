@extends('layouts.app')

@section('title', 'Maui Surf')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/homepage.js') }}"></script>
@endpush

@section('content')
    <!-- Banner -->
    <div class="banner-container">
        <video src="images/surf images videos/surfisti_na_vlne.mp4" class="img-fluid w-100" autoplay loop muted playsinline></video>
        <div class="overlay-text">Maui Surf</div>
        <div class="banner-text">
            <div class="text_on_banner">The waves are calling - ride them in style! Find the best surf gear here.</div>
        </div>
        <form method="GET" action="{{ route('products') }}" class="search-bar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder=" Search...">
            <button type="submit" class="neviditelny-button"><i class="bi bi-search"></i></button>
        </form>
    </div>

    <div class="nav">
        <a href="{{ route('products.byCategory', ['category' => 'Surfboards']) }}"><h2>SURFBOARDS</h2></a>
        <a href="{{ route('products.byCategory', ['category' => 'Equipment']) }}"><h2>EQUIPMENT</h2></a>
        <a href="{{ route('products.byCategory', ['category' => 'Accessories']) }}"><h2>ACCESSORIES</h2></a>
    </div>

    <!-- Products -->
    <div class="products">
        <!-- Surfboards Section -->
        <div class="product_left">
            @if ($surfboards->isNotEmpty())
                <a href="{{ route('product_detail', ['id' => $surfboards[0]->id]) }}">
                    @if ($surfboards[0]->mainImage)
                        <img src="{{ asset($surfboards[0]->mainImage->image_path) }}" alt="{{ $surfboards[0]->name }}" class="surfboard_picture darker">
                    @endif
                </a>
            @endif
            <div class="surfboard_products">
                <div class="three_products">
                    @foreach ($surfboards->skip(1) as $product) <!-- Skip the first one -->
                        <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                            @if ($product->mainImage)
                                <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="surfboard_product darker">
                            @endif
                        </a>
                    @endforeach

                    <!-- If there are less than 4 products, repeat the available ones to fill the space -->
                    @if ($surfboards->count() < 4)
                        @foreach ($surfboards->take(4 - $surfboards->count()) as $product) <!-- Repeat the available products -->
                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                @if ($product->mainImage)
                                    <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="surfboard_product darker">
                                @endif
                            </a>
                        @endforeach
                    @endif
                    <div class="pretty-box">
                        <p class="pretty-text">Surfboards</p>
                    </div>
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products.byCategory', ['category' => 'Surfboards']) }}"><button class="custom-btn">More</button></a>
                </div>
            </div>
        </div>

        <!-- Equipment Section -->
        <div class="product_right">
            @if ($equipment->isNotEmpty())
                <a href="{{ route('product_detail', ['id' => $equipment[0]->id]) }}">
                    @if ($equipment[0]->mainImage)
                        <img src="{{ asset($equipment[0]->mainImage->image_path) }}" alt="{{ $equipment[0]->name }}" class="equipment_picture darker">
                    @endif
                </a>
            @endif
            <div class="equipment_products">
                <div class="three_products">
                    @foreach ($equipment->skip(1) as $product) <!-- Skip the first one -->
                        <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                            @if ($product->mainImage)
                                <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="equipment_product darker">
                            @endif
                        </a>
                    @endforeach

                    <!-- If there are less than 4 products, repeat the available ones to fill the space -->
                    @if ($equipment->count() < 4)
                        @foreach ($equipment->take(4 - $equipment->count()) as $product) <!-- Repeat the available products -->
                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                @if ($product->mainImage)
                                    <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="equipment_product darker">
                                @endif
                            </a>
                        @endforeach
                    @endif
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products.byCategory', ['category' => 'Equipment']) }}"><button class="equipment-custom-btn">More</button></a>
                    <div class="pretty-box-reverse">
                        <p class="pretty-text">Equipment</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accessories Section -->
        <div class="product_left">
            @if ($accessories->isNotEmpty())
                <a href="{{ route('product_detail', ['id' => $accessories[0]->id]) }}">
                    @if ($accessories[0]->mainImage)
                        <img src="{{ asset($accessories[0]->mainImage->image_path) }}" alt="{{ $accessories[0]->name }}" class="surfboard_picture darker">
                    @endif
                </a>
            @endif
            <div class="surfboard_products">
                <div class="three_products">
                    <!-- Check how many products are available and display them -->
                    @foreach ($accessories->skip(1) as $product) <!-- Skip the first one -->
                        <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                            @if ($product->mainImage)
                                <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="surfboard_product darker">
                            @endif
                        </a>
                    @endforeach

                    <!-- If there are less than 4 products, repeat the available ones to fill the space -->
                    @if ($accessories->count() < 4)
                        @foreach ($accessories->take(4 - $accessories->count()) as $product) <!-- Repeat the available products -->
                            <a href="{{ route('product_detail', ['id' => $product->id]) }}">
                                @if ($product->mainImage)
                                    <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="surfboard_product darker">
                                @endif
                            </a>
                        @endforeach
                    @endif
                    <div class="pretty-box">
                        <p class="pretty-text">Accessories</p>
                    </div>
                </div>
                <div class="surfboard_button">
                    <a href="{{ route('products.byCategory', ['category' => 'Accessories']) }}"><button class="custom-btn">More</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
