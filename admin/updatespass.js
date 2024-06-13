document.getElementById('toggle-password').addEventListener('click', function () {
    const passwordField = document.getElementById('Cpassword');
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
document.getElementById('updatespass').addEventListener('click', function () {
    const passwordField = document.getElementById('Updatepassword');
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