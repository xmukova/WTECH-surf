document.addEventListener('DOMContentLoaded', function () {
  // SEARCH
  const searchIcon = document.querySelector('.bi-search');
  const searchBar = document.querySelector('.search-bar');
  const searchInput = document.querySelector('.search-bar input');

  if (searchIcon && searchBar && searchInput) {
      searchIcon.addEventListener('click', function () {
          searchBar.classList.toggle('expanded');
          if (searchBar.classList.contains('expanded')) {
              searchInput.focus();
          }
      });
  } else {
      console.warn('Search elements (.bi-search, .search-bar, or .search-bar input) not found.');
  }

  // Click on product
//   const productClicks = document.querySelectorAll('.surfboard_product, .surfboard_picture, .equipment_product, .equipment_picture');
//   if (productClicks.length > 0) {
//       productClicks.forEach(product => {
//           product.addEventListener('click', function () {
//               window.location.href = 'product_detail.html';
//           });
//       });
//   } else {
//       console.warn('No elements with class .surfboard_product or .surfboard_picture found.');
//   }

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

  // Add event listeners for all categories
  toggleSubcategories('surfboards', 'surfboards-subcategories');
  toggleSubcategories('equipment', 'equipment-subcategories');
  toggleSubcategories('accessories', 'accessories-subcategories');

  // Navigate to cart when clicking bag
    // const myBag = document.querySelector('.bi-bag');
    // if (myBag) {
    //     myBag.addEventListener('click', function () {
    //         window.location.href = 'shopping_cart1.html'; // Redirect to homepage.html
    //     });
    // }
});