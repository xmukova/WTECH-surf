const editButton = document.querySelectorAll('.change-btn'); 
const myWindow = document.getElementById('editOverlay')

editButton.forEach(button => {
    button.addEventListener('click', function() {
        myWindow.style.display = 'block';
    });
});
function closeOverlay() {
    myWindow.style.display = 'none';
}
function deletePhoto(button) {
    button.parentElement.remove();
}
document.getElementById('productForm').addEventListener('submit', function() {
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
const addButton = document.getElementById('add');
const newWindow = document.getElementById('addOverlay');

addButton.addEventListener('click', function() {
    addOverlay.style.display = 'block';
});

function closeOverlay() {
    addOverlay.style.display = 'none';
}

document.getElementById('addProductForm').addEventListener('submit', function() {
    closeOverlay();
});

addOverlay.addEventListener('click', function(e) {
    if (e.target === this) {
        closeOverlay();
    }
});

