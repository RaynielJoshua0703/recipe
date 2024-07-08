//ELEMENTS
var fname = document.getElementById('fname');
var lname = document.getElementById('lname');
var mobile_email = document.getElementById('mobile_email');
var password = document.getElementById('password');
var confirm_password = document.getElementById('confirm_password');
var si_email = document.getElementById('si_email');
var si_password = document.getElementById('si_password');

function updateBackgroundColor(inputElement) {
    if (inputElement.value !== '') {
        inputElement.style.backgroundColor = 'white';
    } 
    else {
        inputElement.style.backgroundColor = 'rgba(255, 0, 0, .3)';
    }
}

function handleFocus(inputElement) {
    inputElement.style.backgroundColor = 'red';
}

function handleBlur(inputElement) {
    updateBackgroundColor(inputElement);
}

//INPUT
fname.addEventListener('input', function() {
    updateBackgroundColor(fname);
});
lname.addEventListener('input', function() {
    updateBackgroundColor(lname);
});
mobile_email.addEventListener('input', function() {
    updateBackgroundColor(mobile_email);
});
password.addEventListener('input', function() {
    updateBackgroundColor(password);
});
confirm_password.addEventListener('input', function() {
    updateBackgroundColor(confirm_password);
});
si_email.addEventListener('input', function() {
    updateBackgroundColor(si_email);
});
si_password.addEventListener('input', function() {
    updateBackgroundColor(si_password);
});
user_name_contact.addEventListener('input', function() {
    updateBackgroundColor(user_name_contact);
});
user_email_contact.addEventListener('input', function() {
    updateBackgroundColor(user_email_contact);
});
user_message_contact.addEventListener('input', function() {
    updateBackgroundColor(user_message_contact);
});

//FOCUS
fname.addEventListener('focus', function() {
    handleFocus(fname);
});
lname.addEventListener('focus', function() {
    handleFocus(lname);
});
mobile_email.addEventListener('focus', function() {
    handleFocus(mobile_email);
});
password.addEventListener('focus', function() {
    handleFocus(password);
});
confirm_password.addEventListener('focus', function() {
    handleFocus(confirm_password);
});
si_email.addEventListener('focus', function() {
    handleFocus(si_email);
});
si_password.addEventListener('focus', function() {
    handleFocus(si_password);
});
user_name_contact.addEventListener('focus', function() {
    handleFocus(user_name_contact);
});
user_email_contact.addEventListener('focus', function() {
    handleFocus(user_email_contact);
});
user_message_contact.addEventListener('focus', function() {
    handleFocus(user_message_contact);
});

//BLUR
fname.addEventListener('blur', function() {
    handleBlur(fname);
});
lname.addEventListener('blur', function() {
    handleBlur(lname);
});
mobile_email.addEventListener('blur', function() {
    handleBlur(mobile_email);
});
password.addEventListener('blur', function() {
    handleBlur(password);
});
confirm_password.addEventListener('blur', function() {
    handleBlur(confirm_password);
});
si_email.addEventListener('blur', function() {
    handleBlur(si_email);
});
si_password.addEventListener('blur', function() {
    handleBlur(si_password);
});
user_name_contact.addEventListener('blur', function() {
    handleBlur(user_name_contact);
});
user_email_contact.addEventListener('blur', function() {
    handleBlur(user_email_contact);
});
user_message_contact.addEventListener('blur', function() {
    handleBlur(user_message_contact);
});