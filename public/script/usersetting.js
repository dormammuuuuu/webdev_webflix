function displayUserData() {
    var user = auth.currentUser;
    var dbref = db.ref(`users/${user.uid}`);
    firebase.auth().onAuthStateChanged(user => {
        if(user) {
            dbref.once("value", snap => {
                var userData = snap.val();
                var userArr = [userData.firstName, userData.lastName, userData.username];
                var userDetails = document.getElementsByClassName("input-boxes");
                console.log(userDetails);
                for(let i = 0; i < 3; i++) {
                    userDetails[i].value = userArr[i];
                }
            })
        }
    });
}

setTimeout(() => {
    displayUserData();
}, 500);

editBtn.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    save.disabled = false;
    for(let i = 0; i < 6; i++) {
        userDetails[i].disabled = false;
    }
}

save.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    var emptyFields = false;

    for(let i = 0; i < 6; i++) {
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
            });
            save.disabled = true;
            }).catch(function(error) {
            console.log(error.message);
            });
        }
    });
}



