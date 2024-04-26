// document.getElementById('editDataForm').addEventListener('submit', function (event) {

//     // We prevent the transmission of data to the server
//     event.preventDefault();


//     // Firstname
//     let firstname = document.getElementById('firstname').value;
//     if (firstname.trim() === '') {
//         alert('Il nome è obbligatorio.');
//         return false;
//     }
//     if (/[0-9]/.test(firstname)) {
//         alert('Il nome non deve contenere numeri.');
//         return false;
//     }

//     // Lastname
//     let lastname = document.getElementById('lastname').value;
//     if (lastname.trim() === '') {
//         alert('Il cognome è obbligatorio.');
//         return false;
//     }
//     if (/[0-9]/.test(lastname)) {
//         alert('Il cognome non deve contenere numeri.');
//         return false;
//     }

//     // Address
//     let address = document.getElementById('address').value;
//     if (address.trim() === '') {
//         alert('L\'indirizzo è obbligatorio.');
//         return false;
//     }
//     if (!/[0-9]/.test(address)) {
//         alert('L\'indirizzo deve contenere almeno un numero.');
//         return false;
//     }

//     // Phone
//     let phoneNumber = document.getElementById('phone_number').value;
//     if (!/^[0-9]+$/.test(phoneNumber)) {
//         alert('Il numero di telefono deve contenere solo numeri.');
//         return false;
//     }

//     // Specializations
//     let specializations = document.getElementById('specializations');
//     let selectedSpecializations = Array.from(specializations.selectedOptions).map(option => option.value);
//     if (selectedSpecializations.length === 0) {
//         alert('Seleziona almeno una specializzazione.');
//         return false;
//     }

//     // CV
//     let cvFile = document.getElementById('CV').files[0];
//     if (cvFile) {
//         let fileExtension = cvFile.name.split('.').pop().toLowerCase();
//         if (fileExtension !== 'pdf' && fileExtension !== 'doc' && fileExtension !== 'docx') {
//             alert('Il file CV deve essere in formato PDF, DOC, o DOCX.');
//             return false;
//         }
//     }

//     // Profile Picture
//     let profilePicFile = document.getElementById('profile_pic').files[0];
//     if (profilePicFile) {
//         let fileExtension = profilePicFile.name.split('.').pop().toLowerCase();
//         if (!['jpg', 'jpeg', 'png'].includes(fileExtension)) {
//             alert('La foto del profilo deve essere un\'immagine (JPG, JPEG, PNG).');
//             return false;
//         }
//     }


//     // The data are transmissed to the server
//     this.submit();
// })



