// PRODUCT OVERVIEW
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
}

function toggleSubcategories(categoryId, subcategoryId) {
    const category = document.getElementById(categoryId);
    const subcategories = document.getElementById(subcategoryId);

    if (category && subcategories) {
        category.addEventListener('click', function () {
            if (subcategories.style.display === 'none' || subcategories.style.display === '') {
                subcategories.style.display = 'block';
            } else {
                subcategories.style.display = 'none';
            }
        });
    }
}

toggleSubcategories('surfboards', 'surfboards-subcategories');
toggleSubcategories('equipment', 'equipment-subcategories');
toggleSubcategories('accessories', 'accessories-subcategories');

// SHIPPING FORM LOGIC
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkout-form');
    const continueButton = document.getElementById('continue-button');
    const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]');
    const shippingRadios = form.querySelectorAll('input[type="radio"][name="shipping"]');
    const paymentRadios = form.querySelectorAll('input[type="radio"][name="payment"]');
    const countrySelect = form.querySelector('select[name="country"]');

    // odstran non-digits
    const phoneInput = form.querySelector('input[name="phone"]');
    phoneInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '');
    });

    // kontrola ci vsetky fields maju spravne data types
    function updateButtonState() {
        let isFilled = true;

        inputs.forEach(input => {
            const value = input.value.trim();
            if (value === '') {
                isFilled = false;
            } else if (input.name === 'phone' || input.name === 'houseNumber' || input.name === 'postalCode') {
                if (!/^[0-9]+$/.test(value)) {
                    isFilled = false; // Must be numbers
                }
            } else if (input.name === 'email') {
                if (!value.includes('@') || !value.includes('.')) {
                    isFilled = false; // Basic email check
                }
            } else {
                if (!/[a-zA-Z]/.test(value)) {
                    isFilled = false; // Must contain at least one letter
                }
            }
        });

        // Check shipping radio buttons (exactly one must be selected)
        const shippingChecked = Array.from(shippingRadios).some(radio => radio.checked);
        if (!shippingChecked) {
            isFilled = false;
        }

        // Check payment radio buttons (exactly one must be selected)
        const paymentChecked = Array.from(paymentRadios).some(radio => radio.checked);
        if (!paymentChecked) {
            isFilled = false;
        }

        // Check country select
        if (countrySelect.value === '') {
            isFilled = false;
        }

        continueButton.disabled = !isFilled;
        console.log('isFilled:', isFilled); 
    }

    // Update button state 
    form.addEventListener('input', updateButtonState);
    form.addEventListener('change', updateButtonState); 

    //form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!continueButton.disabled) {
            console.log('Form submitted, redirecting to shopping_cart3');
            window.location.href = '/cart_step3';
        } else {
            console.log('Button is disabled, no redirect');
        }
    });

    // Button click
    continueButton.addEventListener('click', () => {
        if (!continueButton.disabled) {
            console.log('Button clicked, redirecting to shopping_cart3.html');
            window.location.href = '/cart_step3';
        }
    });
    updateButtonState();
});


// CARD INFO AND BUTTON LOGIC
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkout-form');
    const purchaseButton = document.getElementById('purchase-button');
    const cardNumInput = form.querySelector('input[name="cardNum"]');
    const expDateInput = form.querySelector('input[name="expDate"]');
    const inputs = form.querySelectorAll('input');

    // formatovanie cisla karty
    cardNumInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, ''); // Remove non-digits
        if (value.length > 0) {
            value = value.match(/.{1,4}/g).join(' '); // Split into groups of 4
            e.target.value = value.slice(0, 19); // Limit to 19 chars
        }
    });

    // Format MM/YY
    expDateInput.addEventListener('input', (e) => {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 2) {
            e.target.value = `${value.slice(0, 2)}/${value.slice(2, 4)}`;
        } else {
            e.target.value = value;
        }
    });

    function updateButtonState() {
        let isFilled = true;
        inputs.forEach(input => {
            const value = input.value.trim();
            if (value === '') {
                isFilled = false; // prazdny field
            } else if (input.name === 'cardName') {
                if (!/[a-zA-Z]/.test(value)) {
                    isFilled = false; // Must contain at least one letter
                }
            } else {
                if (!/^[0-9\/\s]+$/.test(value)) {
                    isFilled = false; // Must be numbers 
                }
            }
        });
        purchaseButton.disabled = !isFilled;
    }

    form.addEventListener('input', updateButtonState);

    form.addEventListener('submit', (e) => {
        e.preventDefault(); 
        if (!purchaseButton.disabled) {
            console.log('Form submitted, redirecting...'); 
            window.location.href = '/confirmation'; 
        } else {
            console.log('Button is disabled, no redirect'); 
        }
    });

    purchaseButton.addEventListener('click', () => {
        if (!purchaseButton.disabled) {
            console.log('Button clicked, redirecting...');
            window.location.href = '/confirmation';
        }
    });
});

function showLoginOverlay() {
    const overlay = document.getElementById('login-overlay');
    overlay.style.display = 'flex';
}

document.addEventListener('DOMContentLoaded', () => {
    const signInNo = document.getElementById('sign-in-no');
    const overlay = document.getElementById('login-overlay');

    signInNo.addEventListener('click', () => {
        overlay.style.display = 'none';
    });

    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            overlay.style.display = 'none';
        }
    });
});