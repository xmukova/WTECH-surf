@extends('layouts.app')

@section('title', 'Products')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush

@section('content')
<div class="store-name text-center overlay-text">
    <a href="{{ route('homepage') }}" aria-label="Homepage">
        Maui Surf
    </a>
</div>

<!-- Navigation + Search Bar-->
<nav class="text-center my-3">

    <form method="GET" action="{{ url()->current() }}" class="search-bar">
        <input type="text" name="search" value="{{ request('search') }}" placeholder=" Search...">
        <button type="submit" class="neviditelny-button"><i class="bi bi-search"></i></button>
    </form>

    <div class="container">
        <div class="row g-1">
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'surfboards']) }}">
                    <button class="button_navbar {{ $currentCategory == 'Surfboards' ? 'active_button' : '' }}">SURFBOARDS</button>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'equipment']) }}">
                    <button class="button_navbar {{ $currentCategory == 'Equipment' ? 'active_button' : '' }}">EQUIPMENT</button>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'accessories']) }}">
                    <button class="button_navbar {{ $currentCategory == 'Accessories' ? 'active_button' : '' }}">ACCESSORIES</button>
                </a>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-auto ">  <!--filter button-->
                <button id = "filter_start" class="button_navbar_2 "><i class="bi bi-filter"></i> Filter</button>
            </div>
            <div class="col-auto"> <!-- dropdown menu - zoradenie -->
                <div class="dropdown">
                    <button class="button_navbar_2  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'az']) }}">A - Z</a></li>
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'za']) }}">Z - A</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- FILTER MENU -->
    <aside id="filter-menu" class="filter-sidebar">
            <div class="filter-header">
                <h5>FILTERS</h5>
                <button id = "close_filter"class="close-btn" aria-label="Close filter"><i class="bi bi-x"></i></button>
            </div>
        <form method="GET" action="{{ url()->current() }}">    
            <!-- Reset filter  -->
            <a href="{{ url()->current() }}" class="reset_filter">Reset Filters</a>

            <!-- filters -->
            <div class="filter-section">
                <label class="price_filter">PRICE RANGE</label>
                <div class="price-range">
                    <span id="min-price">$ 0</span>
                    <span id="current-price" class = "current_price">$ 2000</span>
                    <span id="max-price">$ 2 000</span>
                </div>
                <input type="range" name="max_price" id="priceRange" class="range-slider" min="0" max="2000" step="1" value="{{ request()->get('max_price', 2000) }}" >
            </div>

            <div class="filter-section">
                <ul class = "category_filter"> SUBCATEGORY
                    @foreach ($subcategories as $subcategory)
                        <li>
                            <input type="checkbox" name="subcategory[]" value="{{ $subcategory->id }}" id="sub-{{ $subcategory->id }}"
                                {{ in_array($subcategory->id, request()->input('subcategory', [])) ? 'checked' : '' }}>
                            <label for="sub-{{ $subcategory->id }}">{{ $subcategory->name }}</label>
                        </li>
                    @endforeach
                </ul>    
                <ul class = "category_filter"> COLOR
                    <li><input type="checkbox" name="color[]" value="red" id="red"  {{ in_array('red', request()->input('color', [])) ? 'checked' : '' }}><label for="red" >Red</label></li>
                    <li><input type="checkbox" name="color[]" value="green" id="green"  {{ in_array('green', request()->input('color', [])) ? 'checked' : '' }}><label for="green">Green</label></li>
                    <li><input type="checkbox" name="color[]" value="blue" id="blue"  {{ in_array('blue', request()->input('color', [])) ? 'checked' : '' }}><label for="blue">Blue</label></li>
                    <li><input type="checkbox" name="color[]" value="yellow" id="yellow"  {{ in_array('yellow', request()->input('color', [])) ? 'checked' : '' }}><label for="yellow">Yellow</label></li>
                    <li><input type="checkbox" name="color[]" value="white" id="white"  {{ in_array('white', request()->input('color', [])) ? 'checked' : '' }}><label for="white">White</label></li>
                    <li><input type="checkbox" name="color[]" value="black" id="black"  {{ in_array('black', request()->input('color', [])) ? 'checked' : '' }}><label for="black">Black</label></li>
                    <li><input type="checkbox" name="color[]" value="other" id="others"  {{ in_array('others', request()->input('color', [])) ? 'checked' : '' }}><label for="others">Others</label></li>
                </ul>
                <ul class = "category_filter">SIZE
                    <li><input type="checkbox" name="size[]" value="XS" id="sizeXS" {{ in_array('XS', request()->input('size', [])) ? 'checked' : '' }}><label for="sizeS">XS</label></li>
                    <li><input type="checkbox" name="size[]" value="S" id="sizeS" {{ in_array('S', request()->input('size', [])) ? 'checked' : '' }}><label for="sizeS">S</label></li>
                    <li><input type="checkbox" name="size[]" value="M" id="sizeM" {{ in_array('M', request()->input('size', [])) ? 'checked' : '' }}><label for="sizeM">M</label></li>
                    <li><input type="checkbox" name="size[]" value="L" id="sizeL" {{ in_array('L', request()->input('size', [])) ? 'checked' : '' }}><label for="sizeL">L</label></li>
                    <li><input type="checkbox" name="size[]" value="XL" id="sizeXL" {{ in_array('XL', request()->input('size', [])) ? 'checked' : '' }}><label for="sizeL">XL</label></li>
                </ul>
            </div>
            <button class="koniec_filter" type="submit">Apply Filters</button>
        </form>
    </aside>
    <div id = "efekt" class = "overlay"></div>    
    
</nav> 
<div class="background_section"></div>

<!-- PRODUCTS SECTION -->
<div class="container my-4">
    <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        <!-- Product Card -->
        @foreach($products as $product)
            <div class="col">
                <a href="{{ route('product_detail', ['id' => $product->id]) }}" class="link_neviditelny" aria-label="Product details">
                    <div class="card darker">
                        @if ($product->mainImage)
                            <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}">
                        @endif
                        <!-- <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"> -->
                        <div class="produkt-ikonky">
                            @if(auth()->check())
                                @php
                                    $isFavorite = auth()->user()->favorites->contains($product->id);
                                @endphp 
                                <form action="{{ $isFavorite ? route('favorites.remove', $product->id) : route('favorites.add', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @if($isFavorite)
                                        @method('DELETE')
                                    @endif
                                    <button type="submit" class="button-ikonka" aria-label="{{ $isFavorite ? 'Remove from favorites' : 'Add to favorites' }}">
                                        <i class="bi {{ $isFavorite ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                                    </button>
                                </form>
                            @else
                                <button class="button-ikonka" aria-label="First log in to favorite" onclick="event.preventDefault(); showLoginOverlay()">
                                    <i class="bi bi-heart"></i>
                                </button>
                            @endif

                            <form method="POST" action="{{ route('addToCart', ['id' => $product->id]) }}" class="d-inline">
                                @csrf
                                @php
                                    $sizes = array_map('trim', explode(',', $product->size));
                                    $defaultSize = count($sizes) > 0 ? $sizes[0] : null;
                                    $inCart = false;
                                    if (auth()->check()) {
                                        $inCart = auth()->user()->cartItems->contains(function ($item) use ($product) {
                                            return $item->product_id == $product->id;
                                        });
                                    } else {
                                        $sessionCart = session()->get('cart', []);
                                        foreach ($sessionCart as $item) {
                                            if (isset($item['product_id']) && $item['product_id'] == $product->id) {
                                                $inCart = true;
                                                break;
                                            }
                                        }
                                    }
                                @endphp
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="select_size" value="{{ $defaultSize }}">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="button-ikonka" aria-label="Add to cart">
                                    <i class="bi {{ $inCart ? 'bi-bag-check-fill' : 'bi-bag' }}"></i>
                                </button>
                            </form>

                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text_produkt">{{ $product->name }}</h5>
                            <p class="card-text text_cena">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>

<!-- ciselnik stranok -->
<div class="strankovanie">
    <!-- sipka vlavo -->
    @if ($products->onFirstPage())
        <button class="strankovanie_sipka" aria-label="Pages left" disabled><i class="bi bi-chevron-left"></i></button>
    @else
        <a href="{{  request()->fullUrlWithQuery(['page' => $products->currentPage() - 1]) }}" class="strankovanie_sipka">
            <i class="bi bi-chevron-left"></i>
        </a>
    @endif
    <!-- cisla -->
    @for ($i = 1; $i <= $products->lastPage(); $i++)
        <a href="{{ request()->fullUrlWithQuery(['page' => $i]) }}" class="stranka {{ $products->currentPage() == $i ? 'active' : '' }}">
            {{ $i }}
        </a>
    @endfor
    <!-- sipka vpravo -->
    @if ($products->hasMorePages())
        <a href="{{ request()->fullUrlWithQuery(['page' => $products->currentPage() + 1])  }}" class="strankovanie_sipka"><i class="bi bi-chevron-right"></i></a>
    @else
        <button class="strankovanie_sipka" aria-label="Pages right" disabled><i class="bi bi-chevron-right"></i></button>
    @endif
</div>


<!-- overlay pre prihlasenie -->
<div id="login-overlay" class="login-overlay" style="display: none;">
    <div class="overlay-content">
        <p>You must first log in to add favorites. Would you like to log/sign in?</p>
        <div class="overlay-buttons">
            <a href="{{ route('login') }}" class="overlay-btn">Yes</a>
            <button class="overlay-btn" onclick="closeOverlay()">No</button>
        </div>
    </div>
</div>

@endsection