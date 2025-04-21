@extends('layouts.app')

@section('title', 'Favorites')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favorites.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Your Favorite Products</h2>
        <div class="row g-4">
    </div>

    <div class="store-name text-center overlay-text">
        <a href="{{ route('homepage') }}" aria-label="Homepage">
            Maui Surf
        </a>
    </div>

    <div class="container my-4">
        <div class="row  row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($favorites as $product)
            <div class="col">
                <div class="card darker">
                    @if ($product->mainImage)
                        <img src="{{ asset($product->mainImage->image_path) }}" alt="{{ $product->name }}">
                    @endif
                    <!-- <a href="{{ route('product_detail', ['id' => $product->id]) }}" class="link_neviditelny" aria-label="Show details">
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}">
                    </a> -->
                    <div class="produkt-ikonky">
                        <form action="{{ route('favorites.remove', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button-ikonka" aria-label="Remove from favorites">
                                <i class="bi bi-heart-fill"></i>
                            </button>
                        </form>
                        <button class="button-ikonka" aria-label="Add to cart">
                            <i class="bi bi-bag"></i>
                        </button>
                    </div>
                    <div class="text-center">
                        <h5 class="text_produkt">{{ $product->name }}</h5>
                        <p class="text_cena">${{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach

        </div>
    </div>
@endsection