function validateForm() {
    const usernameFieldset = document.getElementById('username').closest('.fieldset');
    const emailFieldset = document.querySelector('input[type="email"]').closest('.fieldset');
    const passwordFieldset = document.getElementById('passwordField').closest('.fieldset');
    const confirmPasswordFieldset = document.getElementById('confirmPasswordField').closest('.fieldset');

    const usernameField = document.getElementById('username');
    const emailField = document.querySelector('input[type="email"]');
    const passwordField = document.getElementById('passwordField');
    const confirmPasswordField = document.getElementById('confirmPasswordField');
    const termsCheckbox = document.getElementById('terms');

    const username = usernameField.value.trim();
    const email = emailField.value.trim();
    const password = passwordField.value.trim();
    const confirmPassword = confirmPasswordField.value.trim();

    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

    function setError(field, fieldset, placeholderMessage) {
        fieldset.classList.add('error');
        const originalPlaceholder = field.getAttribute('data-original-placeholder') || field.placeholder;
        field.setAttribute('data-original-placeholder', originalPlaceholder);
        field.placeholder = placeholderMessage;
    }

    function clearError(field, fieldset) {
        fieldset.classList.remove('error');
        const originalPlaceholder = field.getAttribute('data-original-placeholder');
        if (originalPlaceholder) {
            field.placeholder = originalPlaceholder;
        }
    }

    if (!username) {
        setError(usernameField, usernameFieldset, 'This field cannot be empty');
        usernameField.focus();
        return false;
    } else {
        clearError(usernameField, usernameFieldset);
    }

    if (!email) {
        setError(emailField, emailFieldset, 'This field cannot be empty');
        emailField.focus();
        return false;
    } else if (!emailPattern.test(email)) {
        setError(emailField, emailFieldset, 'Enter a valid email');
        emailField.focus();
        return false;
    } else {
        clearError(emailField, emailFieldset);
    }

    if (!password) {
        setError(passwordField, passwordFieldset, 'This field cannot be empty');
        passwordField.focus();
        return false;
    } else if (password.length < 6) {
        setError(passwordField, passwordFieldset, 'Password must be at least 6 characters long');
        passwordField.focus();
        return false;
    } else {
        clearError(passwordField, passwordFieldset);
    }

    if (password !== confirmPassword) {
        setError(confirmPasswordField, confirmPasswordFieldset, 'Passwords do not match');
        confirmPasswordField.focus();
        return false;
    } else {
        clearError(confirmPasswordField, confirmPasswordFieldset);
    }

    if (!termsCheckbox.checked) {
        alert('Please accept the terms and privacy policies.');
        termsCheckbox.focus();
        return false;
    }

    return true;
}

document.getElementById('signupForm').addEventListener('submit', function(event) {
    if (!validateForm()) {
        event.preventDefault(); 
    }
});