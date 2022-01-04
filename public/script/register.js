// function showTerms() {
//     window.location = "#termsModal";
//     termsModal.style.display = "block";
// }
// function isAgreeChecked() {
//     registerBtn.disabled = (agreeCheckbox.checked) ? false : true;
//     return (agreeCheckbox.checked) ? true : false;
// }

// function register() {
//     var inputFields = document.getElementsByClassName("input-boxes");
//     var emptyFields = false;
//     for(let i = 0; i < 6; i++) {
//         emptyFields = (inputFields[i].value == '') ? true : false;
//         if(inputFields[i].value == '') {
//             inputFields[i].style.borderBottom = "2.5px solid #EE3E3E";
//         } else {
//             inputFields[i].style.border = "none";
//         }
//     }
//     if(emptyFields) {
//         errorMsg.innerHTML = "Please input empty fields";
//     } else {
//         errorMsg.innerHTML = '';
//         if(inputFields[4].value == inputFields[5].value) {
//             inputFields[4].style.border = "none";
//             inputFields[5].style.border = "none";
//             if(isAgreeChecked()) {
//                 registerToDatabase();
//             } else {
//                 showTerms();
//             }
//         } else {
//             errorMsg.innerHTML = "Passwords don't match";
//             inputFields[4].style.borderBottom = "2.5px solid #EE3E3E";
//             inputFields[5].style.borderBottom = "2.5px solid #EE3E3E";
//         }
//     }
// }

// function closeTermsBtn() {
//     termsModal.style.display = "none";
//     window.location = "signup.html";
// }

// function registerToDatabase() {
//     var user = {
//         firstName: "", 
//         lastName: "", 
//         username: "", 
//         email: "",  
//         password: "", 
//         confirmPassword: "", 
//     }
//     var accDetails = [user.firstName, user.lastName, user.username, user.email, user.password, user.confirmPassword];
//     var inputFields = document.getElementsByClassName("input-boxes");

//     for(let i = 0; i < accDetails.length; i++) {
//         accDetails[i] = inputFields[i].value;
//     }
//     email = accDetails[3];
//     password = accDetails[4];

//     auth.createUserWithEmailAndPassword(email, password).then(() => {
//         var user = auth.currentUser;
//         var dbref = db.ref(`users/${user.uid}`);
//         const t = Date.now();
//         const today = new Date(t).toLocaleDateString();

//         dbref.set({
//             firstName: accDetails[0],
//             lastName: accDetails[1],
//             username: accDetails[2],
//             email: accDetails[3],
//             avatar: "https://firebasestorage.googleapis.com/v0/b/streamhub-7924b.appspot.com/o/avatar.png?alt=media&token=aa64e2d4-1aa3-4ded-aace-932373eddf29",
//             dateCreated: today  
//         });
//         setTimeout(() => {
//             window.location = "home.html"
//         }, 1000);
//     }).catch(function(error) {
//         alert(error.message);
//     });
// }

// function logout() {
//     firebase.auth().signOut();
// }
