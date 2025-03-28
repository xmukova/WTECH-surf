const editButton = document.getElementById('edit'); 
const myWindow = document.getElementById('editOverlay')

editButton.addEventListener('click', function() {
    myWindow.style.display = 'block';
});
function closeOverlay() {
    myWindow.style.display = 'none';
}
function deletePhoto(button) {
    button.parentElement.remove();
}
document.getElementById('productForm').addEventListener('submit', function(e) {
    e.preventDefault();
    closeOverlay();
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
        closeOverlay();
    }
});

// NOVY PRODUKT
const addButton = document.getElementById('add'); // Toto bude tlačidlo na zobrazenie overlayu pre pridanie produktu
const addOverlay = document.getElementById('addOverlay');

addButton.addEventListener('click', function() {
    addOverlay.style.display = 'block';
});

function closeOverlay() {
    addOverlay.style.display = 'none';
}

document.getElementById('addProductForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const productName = document.getElementById('productName').value;
    const shortDesc = document.getElementById('shortDesc').value;
    const description = document.getElementById('description').value;
    const features = document.getElementById('features').value;
    const price = document.getElementById('price').value;
    const color = document.getElementById('color').value;

    // Tu môžeš pridať logiku na uloženie nového produktu, napríklad odoslanie na server alebo pridať do zoznamu na stránke.

    console.log('New Product Added:', {
        productName,
        shortDesc,
        description,
        features,
        price,
        color
    });

    closeOverlay();
});

// Funkcia na pridanie fotografií do náhľadu
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

function deletePhoto(button) {
    button.parentElement.remove();
}

addOverlay.addEventListener('click', function(e) {
    if (e.target === this) {
        closeOverlay();
    }
});

