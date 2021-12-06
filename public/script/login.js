login.onclick = () => {
    var inputFields = document.getElementsByClassName("user-input");

    var emptyFields = false;
    for(let i = 0; i < 2; i++) {
        emptyFields = (inputFields[i].value == '') ? true : false;
        if(inputFields[i].value == '') {
            inputFields[i].style.borderBottom = "2.5px solid #EE3E3E";
        } else {
            inputFields[i].style.border = "none";
        }
    }
    if(emptyFields) {
        errorMsgLogin.innerHTML = "Please input empty fields";
    } else {
        errorMsgLogin.innerHTML = '';
        email = inputFields[0].value;
        password = inputFields[1].value;

        auth.signInWithEmailAndPassword(email, password).then(function() {
            var user = auth.currentUser;
            var dbref = db.ref(`users/${user.uid}`);
            const t = Date.now();
            const today = new Date(t).toLocaleDateString();
            dbref.update({
                lastLogin: today
            })
            errorMsgLogin.innerHTML = '';
            inputFields[0].style.border = "none";
            inputFields[1].style.border = "none";
            window.location = "HOMEPAGE.html";
        })
        .catch(function(error) {
            errorMsgLogin.innerHTML = "Invalid email or password";
            inputFields[0].style.borderBottom = "2.5px solid #EE3E3E";
            inputFields[1].style.borderBottom = "2.5px solid #EE3E3E";
        })
    }
}