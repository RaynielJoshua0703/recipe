//For Show Sign In Password.
function signInShowPassword() {
    var passwordInput = document.getElementById("si_password");
    var showPasswordCheckbox = document.getElementById("showPassword");
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

//For Show Sign Up Password.
function signUpShowPassword() {
    var passwordInput = document.getElementById("password");
    var showPasswordCheckbox = document.getElementById("sign_up_showPassword");
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

//For Show Sign Up Confirm Password.
function signUpShowConfirmPassword() {
    var passwordInput = document.getElementById("confirm_password");
    var showPasswordCheckbox = document.getElementById("sign_up_showConfirmPassword");
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}


// For Show Update Password.
function updateShowPassword() {
    var passwordInput = document.getElementById("update_password");
    var showPasswordCheckbox = document.getElementById("update_showPasswordCheckbox");
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

// For Show Update Confirm Password.
function updateShowConfirmPassword() {
    var passwordInput = document.getElementById("update_confirmPassword");
    var showPasswordCheckbox = document.getElementById("update_showConfirmPasswordCheckbox");
    
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}