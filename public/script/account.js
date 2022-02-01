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
    let inputBoxes = $('.account');
    $('#ad-password').val('');
    window.scrollTo(0, 0);
    inputBoxes.prop('disabled', function(i, disabled) { return !disabled; });
    let saveAccountDetails = $('#save-account-details');
    saveAccountDetails.prop('disabled', function(i, disabled) { return !disabled; });
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
    window.scrollTo(0, 0);

    let inputBoxes = $('.password');
    let savePassword = $('#save-password');
    inputBoxes.val('');
    inputBoxes.prop('disabled', function(i, disabled) { return !disabled; });
    savePassword.prop('disabled', function(i, disabled) { return !disabled; });
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

$('.logoutBtn').click(function() {
    $('#update-notif').load('../php-scripts/logout.php')
})

function openSystemDialog() {
    $('#fileInput').click();
}

var files = [];

function imageChanged(e) {
    files = e.files;
    if (files) {
        const reader = new FileReader();
        reader.onload = function() {
            const result = reader.result;
            document.getElementById('avatar').src = result;
        }
        reader.readAsDataURL(files[0]);
        $('#submit-avatar').show();

    }
};

$('#avatar-update').submit(function(e) {
    e.preventDefault();
    let formdata = new FormData(this);
    $.ajax({
        method: "post",
        url: "../php-scripts/upload.php",
        data: formdata,
        processData: false,
        contentType: false,
        dataType: "html",
        success: function(data) {
            $('#submit-avatar').hide();
            $('.update-notif').html(data);
        }
    });
});

body_container.style.display = 'block';