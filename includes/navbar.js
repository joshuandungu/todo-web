// JavaScript to toggle the navbar menu on small screens
document.getElementById('hamburger-icon').addEventListener('click', function() {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active'); // Toggle 'active' class to show or hide the menu
});
