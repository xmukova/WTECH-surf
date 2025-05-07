//EDIT PRODUCT
document.addEventListener('DOMContentLoaded', function () {
    const editButton = document.querySelectorAll('.change-btn'); 
    const myWindow = document.getElementById('editOverlay')

    editButton.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            const form = document.getElementById('productForm');
            form.action = `/admin/products/${productId}`;
            const images = JSON.parse(this.dataset.images);
            const photoPreview = document.getElementById('photoPreview');
            photoPreview.innerHTML = '';

            // images.forEach(imagePath => {
            //     const photoDiv = document.createElement('div');
            //     photoDiv.className = 'photo-item';
            //     photoDiv.innerHTML = `
            //         <img src="/${imagePath}" alt="Product Image">
            //         <button class="delete-photo" type="button" onclick="deletePhoto(this)">
            //             <i class="bi bi-x-circle"></i>
            //         </button>
            //     `;
            //     photoPreview.appendChild(photoDiv);
            // });

            images.forEach(image => {
                const photoDiv = document.createElement('div');
                photoDiv.className = 'photo-item';
                photoDiv.dataset.id = image.id;
                photoDiv.innerHTML = `
                    <img src="/${image.image_path}" alt="Product Image">
                    <button class="delete-photo" type="button" onclick="deletePhoto(this)">
                        <i class="bi bi-x-circle"></i>
                    </button>
                `;
                photoPreview.appendChild(photoDiv);
            });
            


            const sizes = this.dataset.size ? this.dataset.size.split(',').map(s => s.trim().replace(/^"|"$/g, '')) : [];
            const colors = this.dataset.color ? this.dataset.color.split(',').map(c => c.trim().replace(/^"|"$/g, '')) : [];
            

            //vynulovanie checkboxov
            document.querySelectorAll('#sizeedit input[type="checkbox"]').forEach(cb => cb.checked = false);
            document.querySelectorAll('#coloredit input[type="checkbox"]').forEach(cb => cb.checked = false);

            //zaznacenie velkosti
            sizes.forEach(size => {
                const checkbox = document.querySelector(`#sizeedit input[type="checkbox"][value="${size}"]`);
                if (checkbox) checkbox.checked = true;
            });

            // zaznacenie farby
            colors.forEach(color => {
                const checkbox = document.querySelector(`#coloredit input[type="checkbox"][value="${color}"]`);
                if (checkbox) checkbox.checked = true;
            });

            //vyplnenie formulara
            document.getElementById('productName').value = this.dataset.name;
            document.getElementById('size').value = this.dataset.subcategory;
            document.getElementById('shortDesc').value = this.dataset.short_description;
            document.getElementById('description').value = this.dataset.description;
            document.getElementById('features').value = this.dataset.features;
            document.getElementById('price').value = this.dataset.price;
            document.getElementById('stock').value = this.dataset.stock;

            form.action = form.action.replace('product_id_placeholder', this.dataset.id);

            myWindow.style.display = 'block';
        });
    });

    document.getElementById('newPhoto').addEventListener('change', function(e) { 
        const files = e.target.files;
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const photoDiv = document.createElement('div');
                photoDiv.className = 'photo-item';
                photoDiv.innerHTML = `
                    <img src="${e.target.result}" alt="New photo">
                    <button type="button" class="delete-photo" onclick="deletePhoto(this)"><i class="bi bi-x-circle"></i></button>
                `;
                document.getElementById('photoPreview').appendChild(photoDiv);
            };
            reader.readAsDataURL(file);
        }
    });
});

function deletePhoto(button) {
    const photoDiv = button.parentElement;
    const imageId = photoDiv.dataset.id;
    if (imageId) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'deleted_images[]';
        input.value = imageId;
        document.getElementById('productForm').appendChild(input);
    }

    photoDiv.remove();
}

const myWindow = document.getElementById('editOverlay')
function closeEditOverlay() {
    myWindow.style.display = 'none';
}
document.getElementById('productForm').addEventListener('submit', function() {
    closeEditOverlay();
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