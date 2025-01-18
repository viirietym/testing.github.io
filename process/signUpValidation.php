<script>
    class FormValidator {
    constructor() {
        this.password = document.getElementById("password");
        this.confirmPassword = document.getElementById("confirmpassword");
        this.signUpForm = document.getElementById("signUpForm");
        this.usernameEmailAlertContainer = document.getElementById("username-email-alert-container");
        this.passwordAlertContainer = document.getElementById("password-alert-container");
    }

    validateForm() {
        this.removeExistingAlerts();

        if (this.password.value !== this.confirmPassword.value) {
            this.showPasswordAlert('The password you entered do not match. Please try again.');
            return false;
        }

        return true;
    }

    removeExistingAlerts() {
        // Remove existing alerts from both containers
        const existingUsernameEmailAlert = this.usernameEmailAlertContainer.querySelector(".custom-alert");
        const existingPasswordAlert = this.passwordAlertContainer.querySelector(".custom-alert");

        if (existingUsernameEmailAlert) {
            existingUsernameEmailAlert.remove();
        }

        if (existingPasswordAlert) {
            existingPasswordAlert.remove();
        }
    }

    showUsernameEmailAlert(message) {
        const alert = document.createElement('div');
        alert.classList.add('custom-alert');
        alert.innerText = message;
        this.usernameEmailAlertContainer.appendChild(alert);

        setTimeout(() => {
            alert.style.display = 'none';
        }, 3000);
    }

    showPasswordAlert(message) {
        const alert = document.createElement('div');
        alert.classList.add('custom-alert');
        alert.innerText = message;
        this.passwordAlertContainer.appendChild(alert);

        setTimeout(() => {
            alert.style.display = 'none';
        }, 3000);
    }

    showPHPAlerts() {
        <?php if ($passwordMismatch): ?>
            this.showPasswordAlert('The password you entered do not match. Please try again.');
        <?php endif; ?>

        <?php if ($signupFailed): ?>
            this.showUsernameEmailAlert('There was an error during the signup process. Please try again later.');
        <?php endif; ?>

        <?php if ($emailExists): ?>
            this.showUsernameEmailAlert('The email you entered is already in use. Please try another one.');
        <?php endif; ?>

        <?php if ($usernameExists): ?>
            this.showUsernameEmailAlert('The username you entered is already in use. Please try another one.');
        <?php endif; ?>
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const formValidator = new FormValidator();

    formValidator.showPHPAlerts();

    formValidator.signUpForm.onsubmit = function () {
        return formValidator.validateForm();
    };
});

</script>