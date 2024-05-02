
let validateEmail = true; // email

let validatePsw = true; // password

let validatePswConfirmLength = true; // password confirm length
let validatePswConfirmSame = true; // password confirm same

let validateFirstNameRequired = true; // first name required
let validateFirstNameNumbers = true; // first name no numbers

let validateLasttNameRequired = true; // last name required
let validateLasttNameNumbers = true; // last name no numbers

let validateAddress = true; // address

let validatePhoneNumber = true; // phone number

let validateSpecializations = true; // specializations

let validateCv = true; // curriculuym vitae

let validatePfp = true; // profile picture


document.addEventListener('DOMContentLoaded', function() {

    document.getElementById('registrationForm').addEventListener('submit', function (event) {

        // We prevent the transmission of data to the server
        // event.preventDefault();

        // Email
        let email = document.getElementById('email').value;
        let emailError = document.getElementById('emailError');
        let emailRegex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/i;
        if (!emailRegex.test(email)) {
            event.preventDefault();
            validateEmail = false;
            emailError.classList.remove('d-none');
        }

        // Password
        let password = document.getElementById('password').value;
        let pswError = document.getElementById('pswError');
        let passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9]).{8,}$/;
        if (!passwordRegex.test(password)) {
            event.preventDefault();
            validatePsw = false;
            pswError.classList.remove('d-none');
        }

        // Password Confirm
        let passwordConfirm = document.getElementById('password-confirm').value;
        let pswConfirmErrorSame = document.getElementById('pswConfirmErrorSame');
        let pswConfirmErrorLength = document.getElementById('pswConfirmErrorLength');
        if(password.length != passwordConfirm.length){
            event.preventDefault();
            validatePswConfirmLength = false;
            pswConfirmErrorLength.classList.remove('d-none');
        }
        if(password !== passwordConfirm){
            event.preventDefault();
            validatePswConfirmSame = false;
            pswConfirmErrorSame.classList.remove('d-none');
        }

        // Firstname
        let firstname = document.getElementById('firstname').value;
        let firstnameErrorRequired = document.getElementById('firstnameErrorRequired')
        let firstnameErrorNumbers = document.getElementById('firstnameErrorNumbers')
        if (firstname.trim() === '') {
            event.preventDefault();
            validateFirstNameRequired = false;
            firstnameErrorRequired.classList.remove('d-none');
        }
        if (/[0-9]/.test(firstname)) {
            event.preventDefault();
            validateFirstNameNumbers = false;
            firstnameErrorNumbers.classList.remove('d-none');
        }

        // Lastname
        let lastname = document.getElementById('lastname').value;
        let lastnameErrorRequired = document.getElementById('lastnameErrorRequired')
        let lastnameErrorNumbers = document.getElementById('lastnameErrorNumbers')
        if (lastname.trim() === '') {
            event.preventDefault();
            validateLasttNameRequired = false;
            lastnameErrorRequired.classList.remove('d-none');
        }
        if (/[0-9]/.test(lastname)) {
            event.preventDefault();
            validateLasttNameNumbers = false;
            lastnameErrorNumbers.classList.remove('d-none');
        }

        // Address
        let address = document.getElementById('address').value;
        let addressError = document.getElementById('addressError');
        if (address.trim() === '' || !/\d/.test(address)) {
            event.preventDefault();
            validateAddress = false;
            addressError.classList.remove('d-none');
        }

        // Phone
        let phoneNumber = document.getElementById('phone_number').value;
        let phoneNumberError = document.getElementById('phoneNumberError');
        if (!/^[0-9]+$/.test(phoneNumber)) {
            event.preventDefault();
            validatePhoneNumber = false;
            phoneNumberError.classList.remove('d-none');
        }

        // Specializations
        let specializations = document.getElementById('specializations');
        let specializationsError = document.getElementById('specializationsError');
        let selectedSpecializations = Array.from(specializations.selectedOptions).map(option => option.value);
        if (selectedSpecializations.length === 0) {
            event.preventDefault();
            validateSpecializations = false;
            specializationsError.classList.remove('d-none');
        }

        // CV
        let cvFile = document.getElementById('CV').files[0];
        let cvFileError = document.getElementById('cvFileError');
        if (cvFile) {
            let fileExtension = cvFile.name.split('.').pop().toLowerCase();
            if (fileExtension !== 'pdf' && fileExtension !== 'doc' && fileExtension !== 'docx') {
                event.preventDefault();
                validateCv = false;
                cvFileError.classList.remove('d-none');
            }
        }

        // Profile Picture
        let profilePicFile = document.getElementById('ProfilePic').files[0];
        let profilePicFileError = document.getElementById('profilePicFileError');
        if (profilePicFile) {
            let fileExtension = profilePicFile.name.split('.').pop().toLowerCase();
            if (!['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                event.preventDefault();
                validatePfp = false;
                profilePicFileError.classList.remove('d-none');
            }
        }


        // if (!validateEmail ||!validatePsw ||!validatePswConfirmLength ||!validatePswConfirmSame ||!validateFirstNameRequired ||!validateFirstNameNumbers ||!validateLasttNameRequired ||!validateLasttNameNumbers ||!validateAddress ||!validatePhoneNumber ||!validateSpecializations ||!validateCv ||!validatePfp) {
        //     event.preventDefault(); // Prevent form submission if any validation fails
        // }

        if (validateEmail && validatePsw && validatePswConfirmLength && validatePswConfirmSame && validateFirstNameRequired && validateFirstNameNumbers && validateLasttNameRequired && validateLasttNameNumbers && validateAddress && validatePhoneNumber && validateSpecializations && validateCv && validatePfp) {
            this.submit();
        }


        // this.submit();
    })


});



