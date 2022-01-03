var mainApp = {};
(function() {
    var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            uid = user.uid;
        } else {
            uid = null;
            window.location.replace("index.html");
        }
      });
      function logout() {
        firebase.auth().signOut();
    }
    mainApp.logout = logout;
})();

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
                avatar.src = userData.avatar;
            }).then(() => {
                loader.style.display = 'none';
                body_container.style.display = 'block';
            });
        }
    });
}
displayUserData();

var toggle1 = false;
editBtn.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    if (!toggle1){
      save.disabled = false;

        for(let i = 0; i < 4; i++) {
            userDetails[i].disabled = false;
        }
        toggle1 = true;
        editBtn.innerHTML = "CANCEL";

    } else {
    save.disabled = true;

        for(let i = 0; i < 4; i++) {
            userDetails[i].disabled = true;
        }
        toggle1 = false;
        editBtn.innerHTML = "EDIT ✏️";

    }
    
}

var toggle = false;
editBtn2.onclick = () => {
    var userDetails = document.getElementsByClassName("input-boxes");
    if (!toggle){
    save2.disabled = false;

        for(let i = 4; i < 7; i++) {
            userDetails[i].disabled = false;
        }
        toggle = true;
        editBtn2.innerHTML = "CANCEL";
    } else {
    save2.disabled = true;

        for(let i = 4; i < 7; i++) {
            userDetails[i].disabled = true;
        }
        toggle = false;
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

$('#upload').on('change', function(e) {
    let file = [];
    file = e.target.files;
    let reader;
    reader = new FileReader;
    reader.onload = function() {
        avatar.src = reader.result;
    }
    reader.readAsDataURL(file[0]);
    $('#changeAvatarBtn').text('SAVE CHANGES');
});