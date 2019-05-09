let errVerify = document.querySelector('#val-err');

let first_name = document.querySelector('#first-name');
let last_name = document.querySelector('#last-name');
let phoneNo = document.querySelector('#contact');
let branch = document.querySelector('#branch');
let username = document.querySelector('#username');
let access = document.querySelector('#access');

window.localStorage;

function firstNameVal() {
    localStorage.setItem('first_name', first_name.value);
    firstNameStr = localStorage.getItem('first_name');
    console.log(firstNameStr);
    localStorage.getItem('first_name');
}

function lastNameVal() {
    localStorage.setItem('last_name', last_name.value);
    lastNameStr = localStorage.getItem('last_name');
    console.log(lastNameStr);
    localStorage.getItem('last_name');
}

function contactVal() {
    localStorage.setItem('contact', phoneNo.value);
    contactNoStr = localStorage.getItem('contact');
    console.log(contactNoStr);
    localStorage.getItem('contact');
}

function branchVal() {
    localStorage.setItem('branch', branch.value);
    branchValue = localStorage.getItem('branch');
    console.log(branchValue);
    localStorage.getItem('branch');
}

function usernameVal() {
    localStorage.setItem('username', username.value);
    usernameStr = localStorage.getItem('username');
    console.log(usernameStr);
    localStorage.getItem('username');
}

function accessVal() {
    localStorage.setItem('access', access.value);
    accessValue = localStorage.getItem('access');
    console.log(accessValue);
    localStorage.getItem('access');
}

function saveValues() {
    localStorage.setItem('first_name', first_name.value);
    let firstNameStr = localStorage.getItem('first_name');
    console.log(firstNameStr);
    localStorage.getItem('first_name');

    localStorage.setItem('last_name', last_name.value);
    let lastNameStr = localStorage.getItem('last_name');
    console.log(lastNameStr);
    localStorage.getItem('last_name');

    localStorage.setItem('contact', phoneNo.value);
    let contactNoStr = localStorage.getItem('contact');
    console.log(contactNoStr);
    localStorage.getItem('contact');

    localStorage.setItem('branch', branch.value);
    let branchValue = localStorage.getItem('branch');
    console.log(branchValue);
    localStorage.getItem('branch');

    localStorage.setItem('username', username.value);
    let usernameStr = localStorage.getItem('username');
    console.log(usernameStr);
    localStorage.getItem('username');

    localStorage.setItem('access', access.value);
    let accessValue = localStorage.getItem('access');
    console.log(accessValue);
    localStorage.getItem('access');

    first_name.value = firstNameStr;
    last_name.value = lastNameStr;
    // phoneNo.value = contactNoStr;
    branch.value = branchValue;
    username.value = usernameStr;
    access.value = accessValue;

    if (errVerify !== null) {
        first_name.value = firstNameStr;
        last_name.value = lastNameStr;
        // phoneNo.value = contactNoStr;
        branch.value = branchValue;
        username.value = usernameStr;
        access.value = accessValue;
    }
}

localStorage.getItem('first_name');
localStorage.getItem('last_name');
localStorage.getItem('contact');
localStorage.getItem('branch');
localStorage.getItem('username');
localStorage.getItem('access');
