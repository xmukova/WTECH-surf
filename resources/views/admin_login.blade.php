@extends('layouts.app')

@section('title', 'Log In/admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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


<main class="prihlasovacky">
    <div class="background-image"></div>
    <div class="row justify-content-center">    <!--vycentrovane stlpce-->
        <!-- Log In-->
        <div class="prihlasovacky_box col-md-5 p-5 rounded shadow-sm">
            <h2 class="text-center">LOG IN</h2>
            <form>  <!--prihlasovacie udaje-->
                <div class="mb-2">
                    <input type="email" class="form-control" placeholder="e-mail..." required>
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" placeholder="password..." required>
                </div>
                <button type="submit" class="button_prihlasenie">Log In</button>
            </form>
        </div>
    </div>
</main>
@endsection