@extends('layouts.app')

@section('title', 'User Profile/Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/admin_profile.js') }}"></script>
@endpush

@section('content')
    <div class="store-name text-center overlay-text">
        <a href="{{ route('homepage') }}" aria-label="Homepage">
            Maui Surf
        </a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4 order-sm-2">
                <h2 class = "meno">Meno Priezvisko</h2> 
                <button id = "add" class="admin_btn button_uprava farba">
                    ADD PRODUCT<i class="bi bi-plus-square"></i>
                </button>                   
                <button class="admin_btn button_uprava">
                    Log out<i class="bi bi-box-arrow-right"></i>
                </button>
            </div>
    
            <!-- Produkty -->
            <div class="col-sm-8">
                <div class="zoznam">
                    <div class = "lupa">
                    <h3 >Products</h3>
                        <div class="search-bar">
                            <input type="text" placeholder=" Search...">
                            <i class="bi bi-search"></i>
                        </div>
                    </div>
                    <ul class="list-group">
                        <!-- Produkt 1 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/surfboard_green.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>
                                </div>
                                
                            </div>
                        </li>

                        <!-- Produkt 2 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/surfboard_darkred.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>   
                                </div>    
                            </div>
                        </li>

                        <!-- Produkt 3 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/bee_yellow_surfboard.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>   
                                </div>      
                            </div>
                        </li>

                        <!-- Produkt 4 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/cap.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>   
                                </div>     
                            </div>
                        </li>

                        <!-- Produkt 5 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/leash.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>   
                                </div>      
                            </div>
                        </li>

                        <!-- Produkt 6 -->
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <img src="images/products/green_tshirt.jpg" alt="Product" class="product_order_image">
                                <div class="d-flex order_info">
                                    <div>
                                        <p class="product_title">Wave Rider Pro</p>
                                        <p class="product_details">Category: <strong>Surfboard</strong></strong></p>
                                        <p class="product_details">Subcategory: <strong>Middle-boards</strong></strong></p>
                                        <p class="product_details">Prize: <strong>$1299.99</strong></p>
                                    </div>
                                    <div class = "admin_button">
                                        <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                        <button class="change-btn" aria-label="Edit product"> Edit <i class="bi bi-pencil-square"></i></button>
                                    </div>   
                                </div>        
                            </div>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>


        
    </div> 

    <!-- EDIT OVERLAY -->
    <div class="change-product-overlay" id="editOverlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeEditOverlay()">&times;</span>
            <h3>Edit Product</h3>
            <form id="productForm">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" value="Forest Green Surfboard">
                </div>
                
                <div class="mb-3">
                    <label for="shortDesc" class="form-label">Short Description</label>
                    <textarea class="form-control" id="shortDesc" rows="3">Ride the waves with style and confidence on our premium Forest Green Surfboard. Designed to provide exceptional performance and durability, this board is perfect for surfers of all levels. Whether you're a beginner looking to catch your first wave or an experienced surfer pushing the limits of your skills, the Forest Green Surfboard is engineered to meet your needs.</textarea>
                </div>
    
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5">Built to withstand the harshest ocean conditions, the Forest Green Surfboard features a durable fiberglass exterior that enhances its strength while remaining lightweight. Whether you're carving sharp turns or gliding effortlessly across the water, this board offers the ideal balance of performance and comfort. Designed with versatility in mind, the Forest Green Surfboard excels in various wave types, making it the perfect choice for surfers who love to explore different surf conditions. Plus, its stylish dark green color makes a statement in the lineup, ensuring you stand out while you ride. Elevate your surfing experience today and take your wave riding to the next level with the Forest Green Surfboard – your ultimate companion in the water.</textarea>
                </div>
    
                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <textarea class="form-control" id="features" rows="4">- High-quality dark forest green finish
- Ideal for both beginners and experienced surfers
- Premium craftsmanship and durability
- Lightweight and easy to handle</textarea>
                </div>
    
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.1" class="form-control" id="price" value="1270.0">
                </div>
    
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <select class="form-select" id="color">
                        <option value="yellow">Yellow</option>
                        <option value="blue">Blue</option>
                        <option value="red">Red</option>
                        <option value="green" selected>Green</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label class="form-label">Photos</label>
                    <div class="photo-preview" id="photoPreview">
                        <div class="photo-item">
                            <img src="images/products/surfboard_darkgreen.jpg" alt="Dark green surfboard">
                            <button class="delete-photo" onclick="deletePhoto(this)" aria-label="Delete photo">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                        <div class="photo-item">
                            <img src="images/products/detail_side_green.jpg" alt="Dark green surfboard">
                            <button class="delete-photo" onclick="deletePhoto(this)"  aria-label="Delete photo">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                        <div class="photo-item">
                            <img src="images/products/detail_green_tail.jpg" alt="Dark green surfboard">
                            <button class="delete-photo" onclick="deletePhoto(this)"  aria-label="Delete photo">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                        <div class="photo-item">
                            <img src="images/products/detail_green.jpg" alt="Dark green surfboard">
                            <button class="delete-photo" onclick="deletePhoto(this)"  aria-label="Delete photo">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>
                    </div>
                    <input type="file" class="form-control mt-2" id="newPhoto" accept="image/*">
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
    </div>

    <!-- ADD NEW -->
    <div class="change-product-overlay" id="addOverlay">
        <div class="overlay-content">
            <span class="close-btn" onclick="closeAddOverlay()">&times;</span>
            <h3>Add New Product</h3>
            <form id="addProductForm">
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Category</label>
                    <select class="form-select" id="size">
                        <option ></option>
                        <option >Short-boards</option>
                        <option >Middle-boards</option>
                        <option >Large-boards</option>
                        <option >Neopren</option>
                        <option >Fins</option>
                        <option >Leashes</option>
                        <option >T-Shirts</option>
                        <option >Hats</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="shortDesc" class="form-label">Short Description</label>
                    <textarea class="form-control" id="shortDesc" rows="3" placeholder="Enter short description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" placeholder="Enter detailed description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <textarea class="form-control" id="features" rows="4" placeholder="Enter product features"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.1" class="form-control" id="price" placeholder="Enter product price">
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <select class="form-select" id="size">
                        <option >S</option>
                        <option >M</option>
                        <option >L</option>
                        <option >XL</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Color</label>
                        <div>
                            <label>
                                <input type="checkbox" name="color"/> Red
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Green
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Blue
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Black
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> White
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Yellow
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Brown
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Orange
                            </label>
                            <label>
                                <input type="checkbox" name="color"/> Other
                            </label>
                        </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Photos</label>
                    <div class="photo-preview" id="addphotoPreview">
                    </div>
                    <input type="file" class="form-control mt-2" id="addnewPhoto" accept="image/*">
                </div>
                <button type="submit" class="save-btn">Add Product</button>
            </form>
        </div>
    </div>

    <!-- DELETE ISTOTA -->
    <div class="change-product-overlay" id="deleteOverlay">
        <div class="overlay-delete">
            <h6 class="text-center">Are you sure? Do you want to delete this product from your e-shop?</h6>
            <div class="sure-buttons">
                <button class="delete-yes" onclick="deleteProduct()">YES</button>
                <button class="delete-no" onclick="closeDeleteOverlay()">NO</button>
            </div>    
        </div>
    </div>        
@endsection