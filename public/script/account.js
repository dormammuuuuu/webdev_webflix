function toggleDisabled(e) {
    return this.each(function() {
        var $this = $(this);
        if ($this.attr('disabled')) $this.removeAttr('disabled');
        else $this.attr('disabled', 'disabled');
    });
}


$('#editBtn').click(function(e) {
    let inputBoxes = $('.account');
    let saveAccountDetails = $('#save-account-details');
    inputBoxes.prop('disabled', function(i, disabled) { return !disabled; });
    saveAccountDetails.prop('disabled', function(i, disabled) { return !disabled; });
});

$('#editBtn2').click(function(e) {
    let inputBoxes = $('.password');
    let savePassword = $('#save-password');
    inputBoxes.prop('disabled', function(i, disabled) { return !disabled; });
    savePassword.prop('disabled', function(i, disabled) { return !disabled; });
});
/*
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
        save = true;

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
*/
/*
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
*/
$('#upload').on('click', function(e) {
    if ($('#changeAvatarBtn').text() == 'SAVE CHANGES') {
        e.preventDefault();
        alert('EDI WOW');
    } else {
        let fd = new FormData();
        let files = $('#upload')[0].files;

        // Check file selected or not
        if (files.length > 0) {
            fd.append('file', files[0]);

            $('#update-notif').load('../php-scripts/upload.php', {
                file: fd
            })

            // let file = [];
            // file = e.target.files;
            // let reader;
            // reader = new FileReader;
            // reader.onload = function() {
            //     avatar.src = reader.result;
            // }
            // reader.readAsDataURL(file[0]);
            $('#changeAvatarBtn').text('SAVE CHANGES');
        }
    }
});

$('#save-account-details').click(function(e) {
    let firstName = $('#first-name').val();
    let lastName = $('#last-name').val();
    let userName = $('#user-name').val();
    let password = $('#ad-password').val();
    $('#update-notif').load('../php-scripts/save_account_details.php', {
        firstname: firstName,
        lastname: lastName,
        username: userName,
        password: password
    });
});

$('#save-password').click(function(e) {
    let password = $('#old-password').val();
    let newpassword = $('#new-password').val();
    let confpassword = $('#confirm-password').val();

    $('#update-notif').load('../php-scripts/save-password.php', {
        password: password,
        newPassword: newpassword,
        confPassword: confpassword
    });
});

$('.series-button').click(function() {
    window.location.href = "home.php?load=series"
})

$('.favorite-button').click(function() {
    window.location.href = "home.php?load=favorite"
})

$('.soon-button').click(function() {
    window.location.href = "home.php?load=coming-soon"
})

$('.update-notif').click(function() {
    $('#add').load('../php-scripts/logout.php')
})

body_container.style.display = 'block';