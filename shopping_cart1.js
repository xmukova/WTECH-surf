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

// Navigate to homepage when clicking overlay-text
const overlayText = document.querySelector('.overlay-text');
if (overlayText) {
    overlayText.addEventListener('click', function () {
        window.location.href = 'homepage.html'; // Redirect to homepage.html
    });
}

// Navigate to product details when clicking products
const productClicks = document.querySelectorAll('.cart_product, .name');
if (productClicks.length > 0) {
    productClicks.forEach(product => {
        product.addEventListener('click', function () {
            window.location.href = 'product_detail.html';
        });
    });
}