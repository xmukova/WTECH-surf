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
    <div class="search-bar ">
        <input type="text" placeholder=" Search...">
        <i class="bi bi-search"></i>
    </div>
    <div class="container">
        <div class="row g-1">
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'surfboards']) }}">
                    <button class="button_navbar">SURFBOARDS</button>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'equipment']) }}">
                    <button class="button_navbar">EQUIPMENT</button>
                </a>
            </div>
            <div class="col-12 col-sm-4">
                <a href="{{ route('products.byCategory', ['category' => 'accessories']) }}">
                    <button class="button_navbar">ACCESSORIES</button>
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
                        <li><a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}">Most Popular</a></li>
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
    <div id="filter-menu" class="filter-sidebar">
        <div class="filter-header">
            <h5>FILTERS</h5>
            <button id = "close_filter"class="close-btn" aria-label="Close filter"><i class="bi bi-x"></i></button>
        </div>
        <!-- Selected Filters -->
        <div class="selected-filters">
            <span class="filter-chosen">WHITE <span class="remove-filter">&times; 
            </span></span>
            <span class="filter-chosen">GREEN <span class="remove-filter">&times;
            </span></span>
            <span class="filter-chosen">0$ - 800$ <span class="remove-filter">&times;
            </span></span>
        </div>
    
        <!-- filters -->
        <div class="filter-section">
            <label class="price_filter">PRICE RANGE</label>
            <div class="price-range">
                <span id="min-price">$ 0</span>
                <span id="max-price">$ 2 000</span>
            </div>
            <input type="range" class="range-slider" min="0" max="2000" step="1">
        </div>

        <div class="filter-section">
            <ul class = "category_filter"> CATEGORY
                <li>
                    <input type="checkbox" id="shortboards">
                    <label for="shortboards">Short-boards</label>
                </li>
                <li>
                    <input type="checkbox" id="middleboards">
                    <label for="middleboards">Middle-boards</label>
                </li>
                <li>
                    <input type="checkbox" id="longboards">
                    <label for="longboards">Long-boards</label>
                </li>
            </ul>    
            <ul class = "category_filter"> COLOR
                <li>
                    <input type="checkbox" id="red">
                    <label for="red">Red</label>
                </li>
                <li>
                    <input type="checkbox" id="green">
                    <label for="green">Green</label>
                </li>
                <li>
                    <input type="checkbox" id="blue">
                    <label for="blue">Blue</label>
                </li>
                <li>
                    <input type="checkbox" id="yellow">
                    <label for="yellow">Yellow</label>
                </li>
                <li>
                    <input type="checkbox" id="white">
                    <label for="white">White</label>
                </li>
                <li>
                    <input type="checkbox" id="black">
                    <label for="black">Black</label>
                </li>
                <li>
                    <input type="checkbox" id="others">
                    <label for="others">Others</label>
                </li>
            </ul>
            <ul class = "category_filter">SIZE
                    <li>
                        <input type="checkbox" id="sizeS">
                        <label for="sizeS">S</label>
                    </li>
                    <li>
                        <input type="checkbox" id="sizeM">
                        <label for="sizeM">M</label>
                    </li>
                    <li>
                        <input type="checkbox" id="sizeL">
                        <label for="sizeL">L</label>
                    </li>
            </ul>
        </div>
        <button class="koniec_filter">Apply Filters</button>
    </div>
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
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="produkt-ikonky">
                            <button class="button-ikonka" aria-label="Add to favorites">
                                <i class="bi bi-heart"></i>
                            </button>
                            <button class="button-ikonka" aria-label="Add to cart">
                                <i class="bi bi-bag"></i>
                            </button>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title text_produkt">{{ $product->name }}</h5>
                            <p class="card-text text_cena">${{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

        <!-- <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/dark_blue_surfboard.jpg" alt="Product picture" >
                    <div class = "produkt-ikonky">
                        <button class="button-ikonka" aria-label="Add to favorites">
                            <i class="bi bi-heart"></i>
                        </button>
                        <button class="button-ikonka" aria-label="Add to cart">
                            <i class="bi bi-bag" ></i>
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title text_produkt">Wave Rider Pro</h5>
                        <p class="card-text text_cena">$1299.99</p>
                    </div>
                </div>   
            </a>         
        </div>  -->

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
@endsection