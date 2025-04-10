@extends('layouts.app')

@section('title', 'Shopping cart')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/shopping_cart2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/shopping_cart1.js') }}"></script>
@endpush

@section('content')
    <div class="cart-heading">
        <p>Fill out your information</p>
        <div class="steps">
            <p><i class="bi bi-1-circle"></i>.<span class="step">step</span></p>
            <p class="this-step"><i class="bi bi-2-circle"></i>.<span class="step">step</span></p>
            <p><i class="bi bi-3-circle"></i>.<span class="step">step</span></p>
        </div>
    </div>
    <div class="bag">
        <div class="fill-info">
            <form id="checkout-form" class="checkout-form" autocomplete="on">
                <div class="customer-shipping">
                    <p>Customer Information</p>
                    <input type="text" name="firstName" placeholder="First Name" autocomplete="given-name" required>
                    <input type="text" name="lastName" placeholder="Last Name" autocomplete="family-name" required>
                    <input type="email" name="email" placeholder="Email Address" autocomplete="email" required>
                    <input type="tel" name="phone" placeholder="Phone Number" autocomplete="tel" required>
                    <div class="shipping-method">
                        <p>Shipping Method</p>
                        <div class="shipping-radios">
                            <label><input type="radio" name="shipping" value="standard" required> Standard Shipping <span>3,99$</span></label>
                            <label><input type="radio" name="shipping" value="express"> Express Shipping <span>6,99$</span></label>
                        </div>
                    </div>
                    <div class="shipping-method payment-method">
                        <p>Payment Method</p>
                        <div class="shipping-radios">
                            <label><input type="radio" name="payment" value="card" required> Card</label>
                            <label><input type="radio" name="payment" value="applepay"> Apple Pay</label>
                            <label><input type="radio" name="payment" value="paypal"> PayPal</label>
                            <label><input type="radio" name="payment" value="googlepay"> Google Pay</label>
                        </div>
                    </div>
                </div>
                <div class="address">
                    <p>Billing Information</p>
                    <input type="text" name="town" placeholder="Town" autocomplete="address-level2" required>
                    <input type="text" name="street" placeholder="Street" autocomplete="street-address" required>
                    <input type="text" name="houseNumber" placeholder="House Number" required>
                    <input type="text" name="region" placeholder="Region" autocomplete="address-level1" required>
                    <input type="text" name="postalCode" placeholder="Postal Code" autocomplete="postal-code" required>
                    <select name="country" required>
                        <option value="" disabled selected>Country</option>
                        <option value="SK">Slovakia</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="AU">Austria</option>
                        <option value="DE">Germany</option>
                        <option value="UK">United Kingdom</option>
                        <option value="AS">Australia</option>
                    </select>
                </div>
            </form>
        </div>
        <div class="buttons">
            <div class="final-info">
                <p class="shipping-cost"><span class="bold2">Shipping: </span>3.99$</p>
                <p class="total"><span class="bold2">Total: </span>86.99$</p>
            </div>
            <a href="{{ route('shopping_cart1') }}"><button class="shop-button">Go Back</button></a>
            <button type="submit" form="checkout-form" id="continue-button" class="checkout-button" disabled>Continue</button>
        </div>
    </div>
@endsection