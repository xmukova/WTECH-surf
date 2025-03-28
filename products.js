// PRODUCT OVERVIEW
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
} else {
    console.warn('Product overview elements (.bi-list or #product-overview) not found.');
}

// bi-list (subcategory toggle)
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


// FILTER PRODUCTS
// Get references to the elements
const filterButton = document.getElementById('filter_start'); 
const filterMenu = document.getElementById('filter-menu');
const closeButton = document.getElementById('close_filter');
const efekt = document.getElementById('efekt');


// Open the filter menu when clicking the "Open Filters" button
filterButton.addEventListener("click", function() {
    filterMenu.classList.add("visible");  // Add class to make it visible
    efekt.style.display = "block"; // Show the overlay
});

// Close the filter menu when clicking the "close_filter" button or overlay
closeButton.addEventListener("click", closeFilterMenu);
efekt.addEventListener("click", closeFilterMenu);

// Function to close the filter menu
function closeFilterMenu() {
    filterMenu.classList.remove("visible");  // Remove class to hide it
    efekt.style.display = "none"; // Hide the overlay
}
