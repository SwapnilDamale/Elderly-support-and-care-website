let currentIndex = 0;
const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".img-slide");
const contents = document.querySelectorAll(".content");

// Function to update active slide and content
var sliderNav = function(manual){
    btns.forEach((btn) => {
        btn.classList.remove("active");
    });

    slides.forEach((slide) => {
        slide.classList.remove("active");
    });

    contents.forEach((content) => {
        content.classList.remove("active");
    });

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");
};

// Auto-slide every 2 seconds
function autoSlide() {
    currentIndex = (currentIndex + 1) % slides.length; // Increment and loop back to start
    sliderNav(currentIndex);
}

// Run the autoSlide function every 2 seconds
let slideInterval = setInterval(autoSlide, 2000);

// If the user clicks a button, clear the interval and switch manually
btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        clearInterval(slideInterval);  // Clear interval to stop auto-slide
        sliderNav(i);  // Manual slide
        currentIndex = i;  // Update current index
        slideInterval = setInterval(autoSlide, 2000);  // Restart auto-slide after interaction
    });
});
