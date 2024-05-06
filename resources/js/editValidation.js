let validateFirstNameRequired = true;
let validateFirstNameNumbers = true;
let validateLasttNameRequired = true;
let validateLasttNameNumbers = true;
let validateAddress = true;
let validatePhoneNumber = true;
let validateSpecializations = true;
let validateCv = true;
let validatePfp = true;

document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('editDataForm')) {

        document.getElementById('editDataForm').addEventListener('submit', function (event) {

            let firstname = document.getElementById('name').value;
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

            let lastname = document.getElementById('surname').value;
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

            let address = document.getElementById('address').value;
            let addressError = document.getElementById('addressError');
            if (address.trim() === '' || !/\d/.test(address)) {
                event.preventDefault();
                validateAddress = false;
                addressError.classList.remove('d-none');
            }

            let phoneNumber = document.getElementById('phone_number').value;
            let phoneNumberError = document.getElementById('phoneNumberError');
            if (!/^[0-9]+$/.test(phoneNumber)) {
                event.preventDefault();
                validatePhoneNumber = false;
                phoneNumberError.classList.remove('d-none');
            }

            let specializations = document.getElementById('specializations');
            let specializationsError = document.getElementById('specializationsError');
            let selectedSpecializations = Array.from(specializations.selectedOptions).map(option => option.value);
            if (selectedSpecializations.length === 0) {
                event.preventDefault();
                validateSpecializations = false;
                specializationsError.classList.remove('d-none');
            }

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

            let profilePicFile = document.getElementById('profile_pic').files[0];
            let profilePicFileError = document.getElementById('profilePicFileError');
            if (profilePicFile) {
                let fileExtension = profilePicFile.name.split('.').pop().toLowerCase();
                if (!['jpg', 'jpeg', 'png'].includes(fileExtension)) {
                    event.preventDefault();
                    validatePfp = false;
                    profilePicFileError.classList.remove('d-none');
                }
            }

            if (validateFirstNameRequired && validateFirstNameNumbers && validateLasttNameRequired && validateLasttNameNumbers && validateAddress && validatePhoneNumber && validateSpecializations && validateCv && validatePfp) {
                this.submit();
            }
        })

    }
});




