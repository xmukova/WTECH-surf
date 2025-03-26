// PRODUCT OVERVIEW
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
}

// bi-list (unchanged)
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

// Add event listeners for all categories (unchanged)
toggleSubcategories('surfboards', 'surfboards-subcategories');
toggleSubcategories('equipment', 'equipment-subcategories');
toggleSubcategories('accessories', 'accessories-subcategories');

// SHIPPING FORM LOGIC
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkout-form');
    const continueButton = document.getElementById('continue-button');
    const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]');
    const radioInputs = form.querySelectorAll('input[type="radio"][name="shipping"]');
    const countrySelect = form.querySelector('select[name="country"]');

    // Format phone number (remove non-digits)
    const phoneInput = form.querySelector('input[name="phone"]');
    phoneInput.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g, '');
    });

    // Check if all fields are filled with appropriate data types
    function updateButtonState() {
        let isFilled = true;

        // Check text, email, and tel inputs
        inputs.forEach(input => {
            const value = input.value.trim();
            if (value === '') {
                isFilled = false;
            } else if (input.name === 'phone' | input.name === 'houseNumber' | input.name === 'postalCode') {
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

        // Check radio buttons (at least one must be selected)
        const shippingChecked = Array.from(radioInputs).some(radio => radio.checked);
        if (!shippingChecked) {
            isFilled = false;
        }

        // Check country select
        if (countrySelect.value === '') {
            isFilled = false;
        }

        continueButton.disabled = !isFilled;
    }

    // Update button state on input or change
    form.addEventListener('input', updateButtonState);
    form.addEventListener('change', updateButtonState); // For radio and select

    // Handle form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (!continueButton.disabled) {
            console.log('Form submitted, redirecting to shopping_cart3.html');
            window.location.href = 'shopping_cart3.html';
        } else {
            console.log('Button is disabled, no redirect');
        }
    });

    // Fallback: Handle direct button click
    continueButton.addEventListener('click', () => {
        if (!continueButton.disabled) {
            console.log('Button clicked, redirecting to shopping_cart3.html');
            window.location.href = 'shopping_cart3.html';
        }
    });
});


// CARD INFO AND BUTTON LOGIC
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkout-form');
    const purchaseButton = document.getElementById('purchase-button');
    const cardNumInput = form.querySelector('input[name="cardNum"]');
    const expDateInput = form.querySelector('input[name="expDate"]');
    const inputs = form.querySelectorAll('input');

    // Format card number into groups of 4
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

    // Check if all fields are filled with appropriate data types
    function updateButtonState() {
        let isFilled = true;
        inputs.forEach(input => {
            const value = input.value.trim();
            if (value === '') {
                isFilled = false; // Empty field
            } else if (input.name === 'cardName') {
                if (!/[a-zA-Z]/.test(value)) {
                    isFilled = false; // Must contain at least one letter
                }
            } else {
                if (!/^[0-9\/\s]+$/.test(value)) {
                    isFilled = false; // Must be numbers or '/' (for expDate)
                }
            }
        });
        purchaseButton.disabled = !isFilled;
    }

    // Update button state on input
    form.addEventListener('input', updateButtonState);

    // Handle form submission
    form.addEventListener('submit', (e) => {
        e.preventDefault(); // Prevent default form submission
        if (!purchaseButton.disabled) {
            console.log('Form submitted, redirecting...'); // Debug log
            window.location.href = 'confirmation.html'; // Redirect
        } else {
            console.log('Button is disabled, no redirect'); // Debug log
        }
    });

    // Optional: Handle direct button click (for debugging)
    purchaseButton.addEventListener('click', () => {
        if (!purchaseButton.disabled) {
            console.log('Button clicked, redirecting...'); // Debug log
            window.location.href = 'confirmation.html'; // Fallback redirect
        }
    });
});


// OVERLAY LOGIC
document.addEventListener('DOMContentLoaded', () => {
    const checkoutButton = document.querySelector('.checkout-button');
    const overlay = document.getElementById('login-overlay');
    const signInYes = document.getElementById('sign-in-yes');
    const signInNo = document.getElementById('sign-in-no');

    // Show overlay when Checkout is clicked
    checkoutButton.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent any default behavior
        overlay.style.display = 'flex'; // Show overlay
    });

    // Redirect to login.html on "Yes"
    signInYes.addEventListener('click', () => {
        window.location.href = 'login.html';
    });

    // Redirect to shopping_cart2.html on "No"
    signInNo.addEventListener('click', () => {
        window.location.href = 'shopping_cart2.html';
    });

    // Close overlay if clicking outside the content (optional)
    overlay.addEventListener('click', (e) => {
        if (e.target === overlay) {
            overlay.style.display = 'none';
        }
    });
});