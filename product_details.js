// MAUI SCROLL
window.addEventListener("scroll", function () {
    let scrollPosition = window.scrollY;
    let text = document.querySelector(".overlay-text");
    let header = document.querySelector("header");
    
    let targetTop = 60; // The position inside the header where text should stay
    let newTop = 110 - scrollPosition * 1.5; // Moves up as you scroll

    // Stop moving when it reaches the header
    if (newTop <= targetTop) {
        text.style.top = `${targetTop}%`;
    } else {
        text.style.top = `${newTop}%`;
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
            return carouselPhotos[0].offsetWidth; // Dynamically get current width
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

        // Update carousel on window resize
        window.addEventListener('resize', updateCarousel);
    }
}

// PRODUCT OVERVIEW
const biListIcon = document.querySelector('.bi-list');
const productOverviewContainer = document.getElementById('product-overview');

if (biListIcon && productOverviewContainer) {
    biListIcon.addEventListener('click', function () {
        productOverviewContainer.classList.toggle('visible');
    });
}

// bi-list (unchanged)
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

// Add event listeners for all categories (unchanged)
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

// Navigate to homepage when clicking overlay-text
const overlayText = document.querySelector('.overlay-text');
if (overlayText) {
    overlayText.addEventListener('click', function () {
        window.location.href = 'homepage.html'; // Redirect to homepage.html
    });
}

// Navigate to cart when clicking bag
const myBag = document.querySelector('.bi-bag');
if (myBag) {
    myBag.addEventListener('click', function () {
        window.location.href = 'shopping_cart.html'; // Redirect to homepage.html
    });
}

// Click on product
const productClicks = document.querySelectorAll('.recommended-product');
if (productClicks.length > 0) {
    productClicks.forEach(product => {
        product.addEventListener('click', function () {
            window.location.href = 'product_detail.html';
        });
    });
} else {
    console.warn('No elements with class .surfboard_product or .surfboard_picture found.');
}