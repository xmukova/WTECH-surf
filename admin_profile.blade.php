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
                <form method="POST" action="{{ route('admin_logout') }}">   
                    @csrf                
                    <button class="admin_btn button_uprava">
                        Log out<i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>    
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
                        <!-- Produkt  -->
                        @foreach ($products as $product)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}" class="product_order_image">
                                    <div class="d-flex order_info">
                                        <div>
                                            <p class="product_title">{{ $product->name }}</p>
                                            <p class="product_details">Category: <strong>{{ $product->category->name }}</strong></p>
                                            <p class="product_details">Subcategory: <strong>{{ $product->subcategory->name }}</strong></p>
                                            <p class="product_details">Price: <strong>${{ number_format($product->price, 2) }}</strong></p>
                                        </div>
                                        <div class="admin_button">
                                            <button class="delete-product" aria-label="Delete product"><i class="bi bi-trash3"></i></button>
                                            <button class="change-btn" aria-label="Edit product" 
                                                data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}" 
                                                data-subcategory="{{ $product->subcategory_id }}" 
                                                data-description="{{ $product->description }}"
                                                data-short_description="{{ $product->short_description }}"
                                                data-features="{{ $product->features }}"
                                                data-price="{{ $product->price }}"
                                                data-stock="{{ $product->stock}}"
                                                data-images='@json($product->images->pluck("image_path"))'
                                                data-size='@json($product->size)'
                                                data-color='@json($product->color)' > 
                                                Edit <i class="bi bi-pencil-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
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
            <form id="productForm" action="{{ route('edit_product', 'product_id_placeholder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" id="productName">
                </div>

                <select name="subcategory_id" class="form-select" id="size">
                    <option disabled selected>-- Select a Subcategory --</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}" 
                            {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                </select>
                
                <div class="mb-3">
                    <label for="shortDesc" class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_description" id="shortDesc" rows="3"></textarea>
                </div>
    
                <div class="mb-3">
                    <label for="description" name="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5"></textarea>
                </div>
    
                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <textarea class="form-control" name="features" id="features" rows="4"></textarea>
                </div>
    
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" step="0.1" class="form-control" id="price">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" step="1" class="form-control" id="stock">
                </div>
    
                <div class="mb-3" id="sizeedit">
                    <label for="size" class="form-label">Availible sizes</label>
                    <div>
                        <label><input type="checkbox" name="size[]" value="XS"/> XS</label>
                        <label><input type="checkbox" name="size[]" value="S"/> S</label>
                        <label><input type="checkbox" name="size[]" value="M"/> M</label>
                        <label><input type="checkbox" name="size[]" value="L"/> L </label>
                        <label><input type="checkbox" name="size[]" value="XL"/> XL </label>
                    </div>
                </div>

                <div class="mb-3" id="coloredit">
                    <label class="form-label">Select Color</label>
                        <div>
                            <label> <input type="checkbox" name="color[]" value="red"/> Red</label>
                            <label><input type="checkbox" name="color[]" value="green"/> Green </label>
                            <label><input type="checkbox" name="color[]" value="blue"/> Blue </label>
                            <label><input type="checkbox" name="color[]" value="black"/> Black </label>
                            <label><input type="checkbox" name="color[]" value="white"/> White </label>
                            <label><input type="checkbox" name="color[]" value="yellow"/> Yellow</label>
                            <label><input type="checkbox" name="color[]" value="other"/> Other</label>
                        </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Photos</label>
                    <div class="photo-preview" id="photoPreview">
                        @foreach ($product->images as $image)
                            <div class="photo-item">
                                <img src="{{ asset($image->image_path) }}" alt="Product Image">
                                <button class="delete-photo" type="button" onclick="deletePhoto(this)" aria-label="Delete photo">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                            </div>
                        @endforeach
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
            <form id="addProductForm" method="POST" action="{{ route('add_product') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="productName" class="form-label">Product Name</label>
                    <input name="name" type="text" class="form-control" id="productName" placeholder="Enter product name">
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Subcategory</label>
                    <select name="subcategory_id" class="form-select" id="size">
                        <option ></option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="shortDesc" class="form-label">Short Description</label>
                    <textarea name="short_description" class="form-control" id="shortDesc" rows="3" placeholder="Enter short description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" rows="5" placeholder="Enter detailed description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <textarea name="features" class="form-control" id="features" rows="4" placeholder="Enter product features"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input name="price" type="number" step="0.1" class="form-control" id="price" placeholder="Enter product price">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input name="stock" type="number" step="1" class="form-control" id="stock" placeholder="Enter number of pieces you have in warehouse">
                </div>

                <div class="mb-3">
                    <label for="size" class="form-label">Availible sizes</label>
                    <div>
                        <label><input type="checkbox" name="size[]" value="XS"/> XS</label>
                        <label><input type="checkbox" name="size[]" value="S"/> S</label>
                        <label><input type="checkbox" name="size[]" value="M"/> M</label>
                        <label><input type="checkbox" name="size[]" value="L"/> L </label>
                        <label><input type="checkbox" name="size[]" value="XL"/> XL </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Select Color</label>
                        <div>
                            <label> <input type="checkbox" name="color[]" value="red"/> Red</label>
                            <label><input type="checkbox" name="color[]" value="green"/> Green </label>
                            <label><input type="checkbox" name="color[]" value="blue"/> Blue </label>
                            <label><input type="checkbox" name="color[]" value="black"/> Black </label>
                            <label><input type="checkbox" name="color[]" value="white"/> White </label>
                            <label><input type="checkbox" name="color[]" value="yellow"/> Yellow</label>
                            <label><input type="checkbox" name="color[]" value="other"/> Other</label>
                        </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Photos</label>
                    <div class="photo-preview" id="addphotoPreview">
                    </div>
                    <input name="images[]" multiple type="file" class="form-control mt-2" id="addnewPhoto" accept="image/*">
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
            <form id="confirm_delete" action="{{ route('delete_product', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete-yes" onclick="deleteProduct()">YES</button>
            </form>
                <button class="delete-no" onclick="closeDeleteOverlay()">NO</button>
            </div>    
        </div>
    </div>        

@endsection