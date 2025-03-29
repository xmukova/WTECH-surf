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

// REMOVE FROM FAVORITES----------------------------------------------------------------------------------------------------------------------
function deletePhoto(button) {
    const produkt = button.closest('.col');
    produkt.remove();
}

