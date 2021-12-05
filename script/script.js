function showTerms() {
    window.location = "#termsModal";
    termsModal.style.display = "block";
}
function isAgreeChecked() {
    registerBtn.disabled = (agreeCheckbox.checked) ? false : true;
    return (agreeCheckbox.checked) ? true : false;
}

function register() {
    var inputFields = document.getElementsByClassName("input-boxes");
    var emptyFields = false;
    for(let i = 0; i < 6; i++) {
        emptyFields = (inputFields[i].value == '') ? true : false;
        if(inputFields[i].value == '') {
            inputFields[i].style.borderBottom = "2.5px solid #EE3E3E";
        } else {
            inputFields[i].style.border = "none";
        }
    }
    console.log(emptyFields);
    if(emptyFields) {
        errorMsg.innerHTML = "Please input empty fields";
    } else {
        errorMsg.innerHTML = '';
        if(inputFields[4].value == inputFields[5].value) {
            inputFields[4].style.border = "none";
            inputFields[5].style.border = "none";
            if(isAgreeChecked()) {
                alert();
            } else {
                showTerms();
            }
        } else {
            errorMsg.innerHTML = "Passwords don't match";
            inputFields[4].style.borderBottom = "2.5px solid #EE3E3E";
            inputFields[5].style.borderBottom = "2.5px solid #EE3E3E";
        }
    }
}

function closeTermsBtn() {
    termsModal.style.display = "none";
    window.location = "signup.html";
}
