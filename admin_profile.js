//EDIT PRODUCT
const editButton = document.querySelectorAll('.change-btn'); 
const myWindow = document.getElementById('editOverlay')

editButton.forEach(button => {
    button.addEventListener('click', function() {
        myWindow.style.display = 'block';
    });
});
function closeEditOverlay() {
    myWindow.style.display = 'none';
}
function deletePhoto(button) {
    button.parentElement.remove();
}
document.getElementById('productForm').addEventListener('submit', function() {
    closeEditOverlay();
});
document.getElementById('newPhoto').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const photoDiv = document.createElement('div');
            photoDiv.className = 'photo-item';
            photoDiv.innerHTML = `
                <img src="${e.target.result}" alt="New photo">
                <button type="button" class="delete-photo" onclick="deletePhoto(this)">X</button>
            `;
            document.getElementById('photoPreview').appendChild(photoDiv);
        };
        reader.readAsDataURL(file);
    }
});
myWindow.addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditOverlay();
    }
});


// NOVY PRODUKT
const addButton = document.getElementById('add');
const newWindow = document.getElementById('addOverlay');

addButton.addEventListener('click', function() {
    newWindow.style.display = 'block';
});

function closeAddOverlay() {
    newWindow.style.display = 'none';
}

document.getElementById('addProductForm').addEventListener('submit', function() {
    closeAddOverlay();
});

newWindow.addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddOverlay();
    }
});

// DELETE ISTOTA
const trashButton = document.querySelectorAll('.delete-product'); 
const deleteWindow = document.getElementById('deleteOverlay');

trashButton.forEach(button => {
    button.addEventListener('click', function() {
        deleteWindow.style.display = 'block';
    });
});

function closeDeleteOverlay() {
    deleteWindow.style.display = 'none';
}
deleteWindow.addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteOverlay();
    }
});

function deleteProduct(){
    //doplnit vymazanie produktu
    closeDeleteOverlay();
}


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