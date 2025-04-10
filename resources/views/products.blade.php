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
                <button class="button_navbar">SURFBOARDS</button>
            </div>
            <div class="col-12 col-sm-4">
                <button class="button_navbar">EQUIPMENT</button>
            </div>
            <div class="col-12 col-sm-4">
                <button class="button_navbar">ACCESSORIES</button>
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
                    <ul class="dropdown-menu" >
                        <li><a class="dropdown-item" href="#">Most Popular</a></li>
                        <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                        <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                        <li><a class="dropdown-item" href="#">A - Z</a></li>
                        <li><a class="dropdown-item" href="#">Z - A</a></li>
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
        <div class="col">
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/bee_yellow_surfboard.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/surfboard_whitegreen.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/light_blue_surfboard.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/cap.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/cap_mctavish.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/fin.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/neopren.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/neopren3.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/leash.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/black_shirt.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/bucket_hat.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/leash2.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/fin2.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/cap_blue.jpg" alt="Product picture" >
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
        </div> 

        <div class="col">
            <a href="{{ route('product_detail') }}" class="link_neviditelny" aria-label="Product details">
                <div class="card darker">
                    <img src="images/products/green_tshirt.jpg" alt="Product picture" >
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
        </div> 

    </div>
</div>

<!-- ciselnik stranok -->
<div class="strankovanie">
    <button class="strankovanie_sipka" aria-label="Pages left"><i class="bi bi-chevron-left" ></i></button>
    <div >
        <a href="#" class="stranka active">1</a>
        <a href="#" class="stranka">2</a>
        <a href="#" class="stranka">3</a>
        <span class="dots">...</span>
        <a href="#" class="stranka">10</a>
    </div>
    <button class="strankovanie_sipka" aria-label="Pages right"><i class="bi bi-chevron-right"></i></button>
</div>
@endsection