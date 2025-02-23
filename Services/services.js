// Check if the user is logged in (example using sessionStorage or a similar method)
function isLoggedIn() {
    return sessionStorage.getItem('loggedIn') === 'true';
}

// Function to open booking form only if logged in
function openForm(serviceName) {
    if (isLoggedIn()) {
        // If the user is logged in, display the booking form modal
        document.getElementById("bookingForm").style.display = "block";
        // Set the service title in the form
        document.getElementById("serviceTitle").textContent = `Book ${serviceName}`;
        // Save service name for confirmation
        document.getElementById("bookingFormDetails").dataset.serviceName = serviceName;
    } else {
        // If not logged in, prompt the user to log in first
        alert("Please log in to book a service.");
        // Optionally, redirect to the login page
        window.location.href = 'login.html';
    }
}

function closeForm() {
    // Hide the booking form modal
    document.getElementById("bookingForm").style.display = "none";
}

function submitForm(event) {
    event.preventDefault();
    const form = event.target;

    // Get user input values
    const name = form.name.value;
    const address = form.address.value;
    const serviceName = form.dataset.serviceName;

    // Hide the booking form modal
    document.getElementById("bookingForm").style.display = "none";

    // Show the confirmation message modal
    document.getElementById("confirmationMessage").style.display = "block";
    document.getElementById("confirmedService").textContent = serviceName;
    document.getElementById("confirmedAddress").textContent = address;
}

function closeConfirmation() {
    // Hide the confirmation message modal
    document.getElementById("confirmationMessage").style.display = "none";
    // Optionally reset the form after submission
    document.getElementById("bookingFormDetails").reset();
}

// Tabs functionality
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablink" and remove the class "active"
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Default open tab
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tablink").click();

    // Simulate login for testing
    sessionStorage.setItem('loggedIn', 'true'); // Comment out or remove this in real use
});

function scrollTabs(direction) {
    const tabs = document.querySelector('.tabs');
    if (direction === 'left') {
        tabs.scrollBy({ left: -200, behavior: 'smooth' });
    } else {
        tabs.scrollBy({ left: 200, behavior: 'smooth' });
    }
}

// Testimonial carousel functionality
let currentSlide = 0;

function moveCarousel(direction) {
    const testimonials = document.querySelectorAll('.testimonial-item');
    const totalSlides = testimonials.length;
    
    // Update the current slide index
    currentSlide = (currentSlide + direction + totalSlides) % totalSlides;
    
    // Calculate the new transform value for the carousel
    const offset = -currentSlide * 100;
    const carousel = document.querySelector('.testimonials-carousel');
    carousel.style.transform = `translateX(${offset}%)`;
}

// Auto-slide the carousel every 5 seconds
setInterval(() => {
    moveCarousel(1);
}, 5000);

// Auto-login for demonstration (in real applications, this would happen after the user logs in)
// Uncomment this if you want to simulate login state during development
// document.addEventListener("DOMContentLoaded", function() {
//     sessionStorage.setItem('loggedIn', 'true');
// });
