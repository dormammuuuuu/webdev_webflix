$('#toggle-messages').click(function(e) {
    $('#messages-container').css('right', 0);
});

$('#messages-container-hide').click(function(e) {
    $('#messages-container').css('right', -400);
});

setInterval(() => {
    let id = $('#video').attr('data-id');
    $('.messages').load("../php-scripts/chat.php", {
        vidID: id
    });
}, 500);

$('#send-button').click(function(e) {
    e.preventDefault();
    let id = $('#video').attr('data-id');
    let message = $('#input-message').val();
    if (message != "") {
        $('.update').load('../php-scripts/send-chat.php', {
            message: message,
            vidID: id
        });
        $('#input-message').val("");
    }
});

$('body').on('keypress', function(e) {
    if (e.which == 13) {
        let id = $('#video').attr('data-id');
        let message = $('#input-message').val();
        if (message != "") {
            $('.update').load('../php-scripts/send-chat.php', {
                message: message,
                vidID: id
            });
            $('#input-message').val("");
        }
    }
});


$('#input-message').on('input', function(e) {
    if ($(this).val() != "")
        $('#send-button').css('color', '#ff69b4');
    else {
        $('#send-button').css('color', 'white');
    }
});