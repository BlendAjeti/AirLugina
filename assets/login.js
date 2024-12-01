function validateForm() {
    const emailFieldset = document.querySelector('input[type="email"]').closest('.fieldset');
    const passwordFieldset = document.querySelector('input[type="password"]').closest('.fieldset');

    const emailField = document.querySelector('input[type="email"]');
    const passwordField = document.querySelector('input[type="password"]');

    const email = emailField.value.trim();
    const password = passwordField.value.trim();

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

    if (!email) {
        setError(emailField, emailFieldset, 'This place cannot remain empty');
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
        setError(passwordField, passwordFieldset, 'This place cannot remain empty');
        passwordField.focus();
        return false;
    } else {
        clearError(passwordField, passwordFieldset);
    }

    return true;
}

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('passwordField'); 

    if (passwordField.type === 'password') {
        passwordField.type = 'text'; 
        this.classList.remove('bx-hide'); 
        this.classList.add('bx-show');
    } else {
        passwordField.type = 'password'; 
        this.classList.remove('bx-show'); 
        this.classList.add('bx-hide');
    }
});