import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

document.getElementById('registrationForm').addEventListener('submit', function(event) {

    // We prevent the transmission of data to the server
    event.preventDefault();

    // Name
    let name = document.getElementById('name').value;
    if (name.trim() === '') {
        alert('Il nome è obbligatorio.');
        return false;
    }

    // Email
    let email = document.getElementById('email').value;
    let emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/i;
    if (!emailRegex.test(email)) {
        alert('Inserisci un indirizzo email valido.');
        return false;
    }

    // Password
    let password = document.getElementById('password').value;
    let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;
    if (!passwordRegex.test(password)) {
        alert('La password deve contenere almeno un numero, un carattere speciale, delle lettere in minuscolo e lettere in maiuscolo, e avere almeno 8 caratteri.');
        return false;
    }

    // Password Confirm
    let passwordConfirm = document.getElementById('password-confirm').value;
    if (password !== passwordConfirm) {
        alert('Le password non corrispondono.');
        return false;
    } else if (password.length != passwordConfirm.length) {
        alert('Le password non sono della stessa lunghezza.');
        return false;
    }

    // Firstname
    let firstname = document.getElementById('firstname').value;
    if (firstname.trim() === '') {
        alert('Il nome è obbligatorio.');
        return false;
    }

    // Lastname
    let lastname = document.getElementById('lastname').value;
    if (lastname.trim() === '') {
        alert('Il nome è obbligatorio.');
        return false;
    }

    // Address
    let address = document.getElementById('address').value;
    if (address.trim() === '' || !/\d/.test(address)) {
        alert('L\'indirizzo è obbligatorio e deve contenere almeno un numero.');
        return false;
    }

    // Phone
    let phoneNumber = document.getElementById('phone_number').value;
    if (!/^[0-9]+$/.test(phoneNumber)) {
        alert('Il numero di telefono deve contenere solo numeri.');
        return false;
    }

    // The data are transmissed to the server
    this.submit();
})
