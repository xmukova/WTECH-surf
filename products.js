// PRODUCT OVERVIEW------------------------------------------------------------------------------------------------------------------------
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
} else {
    console.warn('Product overview elements (.bi-list or #product-overview) not found.');
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
    } else {
        console.warn(`Subcategory toggle failed: #${categoryId} or #${subcategoryId} not found.`);
    }
}
toggleSubcategories('surfboards', 'surfboards-subcategories');
toggleSubcategories('equipment', 'equipment-subcategories');
toggleSubcategories('accessories', 'accessories-subcategories');


// FILTER PRODUCTS--------------------------------------------------------------------------------------------------------------------------
const filterButton = document.getElementById('filter_start'); 
const filterMenu = document.getElementById('filter-menu');
const closeButton = document.getElementById('close_filter');
const efekt = document.getElementById('efekt');

filterButton.addEventListener("click", function() {
    filterMenu.classList.add("visible");  
    efekt.style.display = "block"; 
});

closeButton.addEventListener("click", closeFilterMenu);
efekt.addEventListener("click", closeFilterMenu);

function closeFilterMenu() {
    filterMenu.classList.remove("visible");  
    efekt.style.display = "none"; 
}


// LOG IN OVERLAY (pri favorites)
function showLoginOverlay() {
    document.getElementById('login-overlay').style.display = 'flex';
}

function closeOverlay() {
    document.getElementById('login-overlay').style.display = 'none';
}

// ADDED TO CART NOTIFICATION ---------------------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function () {
    const flashEl = document.getElementById('flash-data');
    if (flashEl) {
        const successMessage = flashEl.dataset.success;
        if (successMessage) {
            showCartNotification(successMessage);
        }
    }
});

function showCartNotification(message) {
    const notification = document.createElement('div');
    notification.classList.add('cart-notification');
    notification.innerText = message;
    document.body.appendChild(notification);

    // Force reflow before adding the class (important!)
    requestAnimationFrame(() => {
        notification.classList.add('show');
    });

    // Remove after 4s
    setTimeout(() => {
        notification.classList.remove('show');

        // Remove from DOM after transition ends
        setTimeout(() => {
            notification.remove();
        }, 500); // match your CSS transition duration
    }, 4000);
}