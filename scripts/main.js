console.log('yo');

let firstName = document.getElementById('first-name');
let lastName = document.getElementById('last-name');
let contactNo = document.getElementById('contact');
let email = document.getElementById('email');

let sex = document.getElementById('sex');



//FIRST NAME
firstName.oninput = function firstNameValidate() {
    let userInput = document.getElementById('first-name').value;
    let nameValidate = new RegExp("[0-9]");
    
    if (nameValidate.test(userInput)) {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-fn').style.display = 'block';
        return false;
    }
    else {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-fn').style.display = 'none';
        return true;
    }
}


//LAST NAME
lastName.oninput = function lastNameValidate() {
    let userInput = document.getElementById('last-name').value;
    let nameValidate = new RegExp("[0-9]");
    
    if (nameValidate.test(userInput)) {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-ln').style.display = 'block';
        return false;
    }
    else {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-ln').style.display = 'none';
        return true;
    }
}


//CONTACT NUMBER
contact.oninput = function contactNoValidate() {
    let userInput = document.getElementById('contact').value;
    let numValidate = /\d/g;
    
    if (numValidate.test(userInput)) {
        document.getElementById('submit').disabled = false;
        document.getElementById('invalid-num').style.display = 'none';
        return true;
    }
    else {
        document.getElementById('submit').disabled = true;
        document.getElementById('invalid-num').style.display = 'block';
        return false;
    }
}

contact.onfocus = function() {
    document.getElementById('invalid-form').style.display = 'none';
}

contact.onblur = function() {
    let userInput = document.getElementById('contact').value;

    if (userInput.length !== 10) {
        document.getElementById('invalid-form').style.display = 'block';
        document.getElementById('submit').disabled = true;
    } 
}

// EMAIL
email.oninput = function emailValidate() {
    let userInput = email.value;
    let emailValidate = new RegExp("[a-zA-Z0-9]+@[a-zA-Z]+\\.[com|org|net]");


    if (emailValidate.test(userInput)) {
        document.getElementById('invalid-email').style.display = 'none';
        document.getElementById('submit').disabled = false;
        return true;
    }
    else {
        document.getElementById('invalid-email').style.display = 'block';
        document.getElementById('submit').disabled = true;
        return false;
    }
}

//COOKIES
// function setCookie(name, value, expiry) {
//     let expiryDate = new Date();
//     expiryDate.setTime(expiryDate.getTime() + (expiry * 24 * 60 * 60 *1000));
//     let expires = "expires =" + expiryDate.toUTCString();
//     document.cookie = name + "=" + value + ";" + expires + "; path=/";
// }

// function getCookie(name) {
//     let namee = name = ";";
//     let param = document.cookie.split(";");
//     for (let x = 0; x < param.length; x++) {
//         var coo = param[x];
//         while (coo.charAt(0) === ' ') {
//             coo = coo.substring(1);
//         }
//         if (coo.indexOf(name) == 0) {
//             return coo.substring(name.length, coo.length);
//         }
//     }

//     return "";
// }

