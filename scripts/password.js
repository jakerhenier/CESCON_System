let oldKey = document.getElementById('password');
let newKey = document.getElementById('password_new');
let confKey = document.getElementById('password_verify');

let oldPass = document.querySelector('#curr-pass-field');

// PASSWORD CHANGE
confKey.oninput = function() {
    newInput = newKey.value;
    confInput = confKey.value;

    if (newInput === confInput && newInput !== "" & confInput !== "") {
        this.style.borderBottomColor = "#008fff";
        newKey.style.borderBottomColor = "#008fff";
    }
    else {
        this.style.borderBottomColor = "red";
        newKey.style.borderBottomColor = "red";
    }

    if (oldKey.value == oldPass.value && newKey.value == confKey.value) {
        document.getElementById('submit').disabled = false;
    }
    else {
        document.getElementById('submit').disabled = true;
    }
}

oldKey.oninput = function() {
    let verifyPass = oldPass.value;
    let toVerify = oldKey.value;

    if (verifyPass == toVerify) {
        oldKey.style.borderBottomColor = "#008fff";
    }
    else {
        oldKey.style.borderBottomColor = "red";
    }
}