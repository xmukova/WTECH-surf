window.addEventListener("scroll", function () {
    let scrollPosition = window.scrollY;
    let text = document.querySelector(".overlay-text");
    let header = document.querySelector("header");
    
    let targetTop = 60; // The position inside the header where text should stay
    let newTop = 110 - scrollPosition * 0.3; // Moves up as you scroll

    // Stop moving when it reaches the header
    if (newTop <= targetTop) {
        text.style.top = `${targetTop}%`;
    } else {
        text.style.top = `${newTop}%`;
    }
});
