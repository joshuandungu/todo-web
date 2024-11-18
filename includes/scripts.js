// Add this in a separate JS file or a <script> tag
// document.addEventListener("DOMContentLoaded", () => {
    // Confirm before deleting
    // const deleteButtons = document.querySelectorAll('.btn');
    // deleteButtons.forEach(button => {
        // button.addEventListener('click', (e) => {
            // const confirmDelete = confirm("Are you sure you want to delete this item?");
            // if (!confirmDelete) {
                // e.preventDefault();
            // }
        // });
    // });

    // Mobile menu toggle (optional, if you implement a hamburger menu)
    const navbar = document.querySelector('.navbar ul');
    const toggleButton = document.createElement('button');
    toggleButton.textContent = "Menu";
    toggleButton.classList.add('menu-toggle');

    document.querySelector('.navbar').prepend(toggleButton);

    toggleButton.addEventListener('click', () => {
        navbar.classList.toggle('show');
    });
