function showContent(event) {
    event.preventDefault();
    // Hide all main content sections
    document.querySelectorAll('.main-content').forEach(section => {
        section.classList.add('d-none');
    });
    // Show the target main content section
    const target = event.target.closest('a').getAttribute('data-target');
    document.querySelector(target).classList.remove('d-none');
}