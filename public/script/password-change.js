$('#password-submit').submit(function(e) {
    e.preventDefault();
    let token = $('#token').val();
    let password = $('#password').val();
    let confPassword = $('#confirm-password').val();
    let userEmail = $('#user-email').text();
    let form = $('#password-submit');
    console.log(token, password, confPassword);
    $.ajax({
        method: "post",
        url: "../php-scripts/password-change-script.php",
        data: {
            token: token,
            password: password,
            confirmpass: confPassword,
            email: userEmail
        },
        success: function(data) {
            $('#success').html(data);
        }
    });
})