document.getElementById('Utoggle-password').addEventListener('click', function () {
    const passwordField = document.getElementById('Upassword');
    const icon = this;

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
});