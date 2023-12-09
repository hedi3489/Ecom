var passwordInput = document.getElementById('password');
var confirmePasswordInput = document.getElementById('confirm-password');

function validateUsername(){
    var username = usernameInput.value;
    var regex = /^[a-zA-Z0-9_-]{3,16}$/;
    if(!regex.test(username)){
        usernameInput.setCustomValidy("Invalid username");
    }else{
        usernameInput.setCustomValidity('');
    }
}

function validateEmail(){
    var email = emailInput.value;
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!regex.test(email)){
        emailInput.setCustomValidity("Invalid email address");
    }else{
        emailInput.setCustomValidty('');
    }
}

function validatePhone(){
    var phone = phoneInput.value;
    var regex = /^\d{10}$/;
    if(!regex.test(phone)){
        phoneInput.setCustomValidity("Invalid phone number");
    }else{
        phoneInput.setCustomValidaty('');
    }
}

function validatePassword(){
    if(passwordInput.value !== confirmePasswordInput.value){
        confirmePasswordInput.setCustomValidaty("Passwords don't match");
    }else{
        confirmePasswordInput.setCustomValidy('');
    }
}

usernameInput.addEventListener('change', validateUsername);
emailInput.addEventListener('change', validateEmail);
phoneInput.addEventListener('change', validatePhone);
passwordInput.addEventListener('change', validatePassword);
confirmePasswordInput.addEventListener('keyup', validatePassword);