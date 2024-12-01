function validateForm() {
    const nameFieldset = document.getElementById('nameField').closest('.fieldset');
    const surnameFieldset = document.getElementById('surnameField').closest('.fieldset');
    const emailFieldset = document.querySelector('input[type="email"]').closest('.fieldset');
    const passwordFieldset = document.getElementById('passwordField').closest('.fieldset');
    const confirmPasswordFieldset = document.getElementById('confirmPasswordField').closest('.fieldset');

    const nameField = document.getElementById('nameField');
    const surnameField = document.getElementById('surnameField');
    const emailField = document.querySelector('input[type="email"]');
    const passwordField = document.getElementById('passwordField');
    const confirmPasswordField = document.getElementById('confirmPasswordField');
    const termsCheckbox = document.getElementById('terms');

    const name = nameField.value.trim();
    const surname = surnameField.value.trim();
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


    if (!name) {
        setError(nameField, nameFieldset, 'This place cannot remain empty');
        nameField.focus();
        return false;
    } else {
        clearError(nameField, nameFieldset);
    }

    
    if (!surname) {
        setError(surnameField, surnameFieldset, 'This place cannot remain empty');
        surnameField.focus();
        return false;
    } else {
        clearError(surnameField, surnameFieldset);
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


document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('passwordField'); 

    if (passwordField.type === 'password') {
        passwordField.type = 'text'; 
        this.classList.remove('bx-hide'); 
    } else {
        passwordField.type = 'password'; 
        this.classList.remove('bx-show'); 
        this.classList.add('bx-hide');
    }
});
