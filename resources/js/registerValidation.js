
document.getElementById('registrationForm').addEventListener('submit', function (event) {

    // We prevent the transmission of data to the server
    event.preventDefault();

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
    if(password.length != passwordConfirm.length){
        alert('Le password non sono della stessa lunghezza.');
        return false;
    }
    if(password !== passwordConfirm){
        alert('Le password non corrispondono.');
        return false;
    }

    // Firstname
    let firstname = document.getElementById('firstname').value;
    if (firstname.trim() === '') {
        alert('Il nome è obbligatorio.');
        return false;
    }
    if (/[0-9]/.test(firstname)) {
        alert('Il nome non deve contenere numeri.');
        return false;
    }

    // Lastname
    let lastname = document.getElementById('lastname').value;
    if (lastname.trim() === '') {
        alert('Il cognome è obbligatorio.');
        return false;
    }
    if (/[0-9]/.test(lastname)) {
        alert('Il cognome non deve contenere numeri.');
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

    // Specializations
    let specializations = document.getElementById('specializations');
    let selectedSpecializations = Array.from(specializations.selectedOptions).map(option => option.value);
    if (selectedSpecializations.length === 0) {
        alert('Seleziona almeno una specializzazione.');
        return false;
    }

    // CV
    let cvFile = document.getElementById('CV').files[0];
    if (cvFile) {
        let fileExtension = cvFile.name.split('.').pop().toLowerCase();
        if (fileExtension !== 'pdf' && fileExtension !== 'doc' && fileExtension !== 'docx') {
            alert('Il file CV deve essere in formato PDF, DOC, o DOCX.');
            return false;
        }
    }

    // Profile Picture
    let profilePicFile = document.getElementById('profile_pic').files[0];
    if (profilePicFile) {
        let fileExtension = profilePicFile.name.split('.').pop().toLowerCase();
        if (!['jpg', 'jpeg', 'png'].includes(fileExtension)) {
            alert('La foto del profilo deve essere un\'immagine (JPG, JPEG, PNG).');
            return false;
        }
    }


    // The data are transmissed to the server
    this.submit();
})

