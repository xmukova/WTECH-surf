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
filterButton.addEventListener('click', () => {
    filterMenu.style.right = '0'; // Slide the filter menu into view
    efekt.style.display = 'block'; // Show the overlay
    filterMenu.classList.add('filter-open'); // Add the class to show the overlay
});

// Hide the filter menu and overlay when the close button is clicked
closeButton.addEventListener('click', () => {
    filterMenu.style.right = '-320px'; // Slide the filter menu out of view
    efekt.style.display = 'none'; // Hide the overlay
    filterMenu.classList.remove('filter-open'); // Remove the class to hide the overlay
});

// Optionally, you can also close the filter menu when the user clicks on the overlay
efekt.addEventListener('click', () => {
    filterMenu.style.right = '-320px'; // Slide the filter menu out of view
    efekt.style.display = 'none'; // Hide the overlay
    filterMenu.classList.remove('filter-open'); // Remove the class to hide the overlay
});
