const filterLinks = document.querySelectorAll('.filter-link');

filterLinks.forEach(link => {
    link.addEventListener('click', function () {
        // Check if the clicked filter is already active
        if (link.classList.contains('active')) {
            link.classList.remove('active'); // If already active, remove 'active'
        } else {
            // Remove 'active' from all filters
            filterLinks.forEach(link => link.classList.remove('active'));
            // Add 'active' to the clicked filter
            link.classList.add('active');
        }
    });
});
