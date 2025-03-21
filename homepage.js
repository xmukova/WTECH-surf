// script.js
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

biListIcon.addEventListener('click', function() {
    productOverviewContainer.style.display = (productOverviewContainer.style.display === 'none' || productOverviewContainer.style.display === '') ? 'block' : 'none';
});

//bi-list
function toggleSubcategories(categoryId, subcategoryId) {
const category = document.getElementById(categoryId);
const subcategories = document.getElementById(subcategoryId);

category.addEventListener('click', function() {
    if (subcategories.style.display === 'none' || subcategories.style.display === '') {
        subcategories.style.display = 'block';
    } else {
        subcategories.style.display = 'none';
    }
});
}

// Add event listeners for all categories
toggleSubcategories('surfboards', 'surfboards-subcategories');
toggleSubcategories('equipment', 'equipment-subcategories');
toggleSubcategories('accessories', 'accessories-subcategories');

//search
// JavaScript to toggle the search bar visibility on small screens
const searchIcon = document.querySelector('.bi-search');
const searchBar = document.querySelector('.search-bar');
const searchInput = document.querySelector('.search-bar input');

searchIcon.addEventListener('click', function () {
  // Toggle the expanded class on the search bar
  searchBar.classList.toggle('expanded');

  // If the search bar is expanded, focus on the input field
  if (searchBar.classList.contains('expanded')) {
    searchInput.focus();
  }
});
