let firstName = document.getElementById('first-name');
let lastName = document.getElementById('last-name');
let contactNo = document.getElementById('contact');
let email = document.getElementById('email');


//FIRST NAME
firstName.oninput = function() {
    let userInput = document.getElementById('first-name').value;
    let nameValidate = new RegExp("[0-9]");
    
    if (nameValidate.test(userInput)) {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-fn').style.display = 'block';
    }
    else {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-fn').style.display = 'none';
    }
}


//LAST NAME
lastName.oninput = function() {
    let userInput = document.getElementById('last-name').value;
    let nameValidate = new RegExp("[0-9]");
    
    if (nameValidate.test(userInput)) {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-ln').style.display = 'block';
    }
    else {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-ln').style.display = 'none';
    }
}


//CONTACT NUMBER
contact.oninput = function() {
    let userInput = document.getElementById('contact').value;
    let numValidate = new RegExp("[0-9]");
    
    if (numValidate.test(userInput)) {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-num').style.display = 'none';
    }
    else {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-num').style.display = 'block';
    }
}

contact.onfocus = function() {
    document.getElementById('invalid-form').style.display = 'none';
}

contact.onblur = function() {
    let userInput = document.getElementById('contact').value;

    if (userInput.length !== 10) document.getElementById('invalid-form').style.display = 'block';
}

// EMAIL
email.oninput = function() {
    let userInput = email.value;
    let emailValidate = new RegExp("[a-zA-Z0-9]+@[a-zA-Z]+[\.com|\.org|\.net]");


    if (emailValidate.test(userInput)) {
        document.getElementById('invalid-email').style.display = 'none';
    }
    else {
        document.getElementById('invalid-email').style.display = 'block';
    }
}