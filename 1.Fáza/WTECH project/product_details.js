// MAUI SCROLL - zastavi sa heading na headeri
window.addEventListener("scroll", function () {
    let scrollPosition = window.scrollY;
    let link = document.querySelector(".overlay-link"); 
    let header = document.querySelector("header");
    
    let targetTop = 60; // kde zastavi
    let newTop = 110 - scrollPosition * 1.5; // posuva sa hore ked scrollneme

    // prestane sa hybat ked zastane na headeri
    if (newTop <= targetTop) {
        link.style.top = `${targetTop}%`;
    } else {
        link.style.top = `${newTop}%`;
    }
});

// CAROUSEL
if (window.matchMedia('(max-width: 576px)').matches) {
    const carouselTrack = document.querySelector('.carousel_track');
    const carouselPhotos = document.querySelectorAll('.carousel_photo, .carousel_photo1, .carousel_photo2');
    const prevButton = document.getElementById('carousel-prev');
    const nextButton = document.getElementById('carousel-next');

    if (carouselTrack && carouselPhotos.length > 0 && prevButton && nextButton) {
        let currentIndex = 0;
        const totalPhotos = carouselPhotos.length;

        function getSlideWidth() {
            return carouselPhotos[0].offsetWidth; // dynamicky zoberie momentalnu sirku fotky (aby sme sa vedeli slidnut presne o fotku)
        }

        function updateCarousel() {
            const slideWidth = getSlideWidth();
            const translateX = -currentIndex * slideWidth;
            carouselTrack.style.transform = `translateX(${translateX}px)`;
        }

        nextButton.addEventListener('click', function () {
            currentIndex = (currentIndex + 1) % totalPhotos;
            updateCarousel();
        });

        prevButton.addEventListener('click', function () {
            currentIndex = (currentIndex - 1 + totalPhotos) % totalPhotos;
            updateCarousel();
        });

        window.addEventListener('resize', updateCarousel);
    }
}

// PHOTO BIG OVERLAY
const carouselImages = document.querySelectorAll('.carousel_photo, .carousel_photo1, .carousel_photo2');
const imageOverlay = document.getElementById('imageOverlay');
const enlargedImage = document.getElementById('enlargedImage');

// click na fotku
carouselImages.forEach(image => {
    image.addEventListener('click', () => {
        enlargedImage.src = image.src;
        imageOverlay.classList.add('active');
    });
});

// zavri overlay ked kliknes mimo
imageOverlay.addEventListener('click', (e) => {
    if (e.target === imageOverlay) {
        imageOverlay.classList.remove('active');
    }
});

// PRODUCT OVERVIEW
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
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
    }
}

toggleSubcategories('surfboards', 'surfboards-subcategories');
toggleSubcategories('equipment', 'equipment-subcategories');
toggleSubcategories('accessories', 'accessories-subcategories');

// FAVOURITE HEART FILL
const favButton = document.querySelector('.fav-button');
if (favButton) {
    const heartIcon = favButton.querySelector('.bi-heart.smaller');
    if (heartIcon) {
        favButton.addEventListener('click', function () {
            heartIcon.classList.toggle('bi-heart');
            heartIcon.classList.toggle('bi-heart-fill');
        });
    }
}

// CART COUNT - BUY BUTTON
const buyButton = document.querySelector('.buy-button');
const cartCount = document.querySelector('.cart-count');

if (buyButton && cartCount) {
    buyButton.addEventListener('click', function () {
        cartCount.classList.add('show');
        
        setTimeout(() => {
            cartCount.classList.remove('show');
            cartCount.style.display = 'inline-block'; 
        }, 500);
    });
}

// TOGGLE REVIEWS DROPDOWN ak klikneme na text "Reviews", otvori sa dropdown a presunie nas kde sa nachadza
document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelector('.stars');
    const reviewCheckbox = document.getElementById('dropdown-toggle-4');
    const reviewBlock = document.querySelector('.dropdown-features .detail-block:nth-child(4)');

    if (stars && reviewCheckbox && reviewBlock) {
        stars.addEventListener('click', () => {
            reviewCheckbox.checked = !reviewCheckbox.checked; 
            if (reviewCheckbox.checked) {
                // Scroll na zaciatok reviews
                reviewBlock.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    }
});