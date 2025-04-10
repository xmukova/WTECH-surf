<!--Header-->
<header class="d-flex justify-content-between align-items-center bg-light border-bottom">
    <div class="logo-container">
        <a href="{{ route('homepage') }}" class = "link_neviditelny" aria-label="Homepage">
            <img src="/images/logo.png" alt="Logo" class="logo">
        </a>    
        <i class="bi bi-list icon_click"></i>
    </div>
    <div class="icons d-flex gap-3">
        <a href="{{ route('favorites') }}" aria-label="Favorites">
            <i class="bi bi-heart icon_click" ></i>
        </a>
        <a href="{{ route('login') }}" aria-label="Profile">
            <i class="bi bi-person icon_click" ></i>
        </a>
        <a href="{{ route('shopping_cart1') }} " aria-label="Shopping cart">
            <i class="bi bi-bag icon_click" ></i>
        </a>
    </div>
    <!-- <a href="{{ route('homepage') }}" class="overlay-link"><div class="overlay-text">Maui Surf</div></a> -->
    <!-- PRODUCT OVERVIEW -->
    <div id="product-overview" class="product-overview-container">
        <div class="product-overview">
            <ul>
                <li id="surfboards" class="category">SURFBOARDS</li>
                    <ul id="surfboards-subcategories" style="display: none;">
                        <a href="{{ route('products') }}"><li>All</li></a>
                        <a href="{{ route('products') }}"><li>Short-boards</li></a>
                        <a href="{{ route('products') }}"><li>Middle-boards</li></a>
                        <a href="{{ route('products') }}"><li>Long-boards</li></a>
                    </ul>
                <li id="equipment" class="category">EQUIPMENT</li>
                    <ul id="equipment-subcategories" style="display: none;">
                        <a href="{{ route('products') }}"><li>All</li></a>
                        <a href="{{ route('products') }}"><li>Neopren</li></a>
                        <a href="{{ route('products') }}"><li>Fins</li></a>
                        <a href="{{ route('products') }}"><li>Leashes</li></a>
                    </ul>
                <li id="accessories" class="category">ACCESSORIES</li>
                    <ul id="accessories-subcategories" style="display: none;">
                        <a href="{{ route('products') }}"><li>All</li></a>
                        <a href="{{ route('products') }}"><li>T-shirts</li></a>
                        <a href="{{ route('products') }}"><li>Hats</li></a>
                    </ul>
                <a href="{{ route('favorites') }}"><li id="favourites" class="category thin">FAVOURITES</li></a>
                <a href="{{ route('profile') }}"><li id="profile" class="category thin">PROFILE</li></a>
                <a href="{{ route('shopping_cart1') }}"><li id="shopping_bag" class="category thin">SHOPPING BAG</li></a>
            </ul>
        </div>
    </div>
</header>