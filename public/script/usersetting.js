function displayUserData() {
    firebase.auth().onAuthStateChanged(user => {
        var user = auth.currentUser;
        var dbref = db.ref(`users/${user.uid}`);
        if(user) {
            dbref.once("value", snap => {
                var userData = snap.val();
                var userArr = [userData.firstName, userData.lastName, userData.username];
                var userDetails = document.getElementsByClassName("input-boxes");
                for(let i = 0; i < 3; i++) {
                    userDetails[i].value = userArr[i];
                }
            }).then(() => {
                loader.style.display = 'none';
                body_container.style.display = 'block';
            });
        }
    });
}
displayUserData();

editBtn.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    save.disabled = false;
    for(let i = 0; i < 4; i++) {
        userDetails[i].disabled = false;
    }
}

editBtn2.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    save.disabled = false;
    for(let i = 4; i < 7; i++) {
        userDetails[i].disabled = false;
    }
}

save.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    var emptyFields = false;

    for(let i = 0; i < 3; i++) {
        if(userDetails[i].value == '') {
            emptyFields = (userDetails[i].value == '') ? true : false;
            userDetails[i].style.borderBottom = "2px solid red";
        } else {
            userDetails[i].style.borderBottom = "none";
        }
    }

    if(emptyFields) {
        errorMsg.innerHTML = "Please input empty fields";
    } else {
        errorMsg.innerHTML = "";
        if(userDetails[4].value == userDetails[5].value) {
            updateUserDetails();
            errorMsg.innerHTML = "";
        } else {
            errorMsg.innerHTML = "Passwords doesn't match";

        }
    }
}

function updateUserDetails() {
    var user = auth.currentUser;
    var dbref = db.ref(`users/${user.uid}`);
    var userDetails = document.getElementsByClassName("input-boxes");
    var credential = firebase.auth.EmailAuthProvider.credential(firebase.auth().currentUser.email, userDetails[3].value);
    
    firebase.auth().onAuthStateChanged(user => {
    if(user) {
        user.reauthenticateWithCredential(credential).then(function() {
            dbref.update({
                firstName: userDetails[0].value,
                lastName: userDetails[1].value,
                username: userDetails[2].value,
            }).then(() => {
                var userDetails = document.getElementsByClassName("input-boxes");
                save.disabled = true;
                for(let i = 0; i < 4; i++) {
                    userDetails[i].disabled = true;
                }
            });
            
            }).catch(function(error) {
                errorMsg.innerHTML = error.message;
            });
        }
    });
}