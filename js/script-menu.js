const menuIcon = document.getElementById('menu-icon');
const menuList = document.getElementById('menu-list');
const mobileMenu = document.querySelector('.mobile-menu');

// Function to toggle menu visibility
function toggleMenu() {
    if (menuList.style.display === 'block') {
        menuList.style.display = 'none';
    } else {
        menuList.style.display = 'block';
    }
}

// Show menu on hover (Desktop)
menuIcon.addEventListener('mouseover', () => {
    if (window.innerWidth > 768) { // Only apply hover on desktops
        menuList.style.display = 'block';
    }
});

// Hide menu when mouse leaves (Desktop)
mobileMenu.addEventListener('mouseleave', () => {
    if (window.innerWidth > 768) {
        menuList.style.display = 'none';
    }
});

// Toggle menu on click (Mobile)
menuIcon.addEventListener('click', () => {
    if (window.innerWidth <= 768) { // Only for mobile
        toggleMenu();
    }
});

// Close menu when clicking outside (Mobile)
document.addEventListener('click', (event) => {
    if (window.innerWidth <= 768 && !menuIcon.contains(event.target) && !menuList.contains(event.target)) {
        menuList.style.display = 'none';
    }
});