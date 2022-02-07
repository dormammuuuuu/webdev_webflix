$(function() {
    let bgarr = ['thumb.png', 'thumb2.jpg', 'thumb3.jpg'];

    function preload(bgarr) {
        $(arrayOfImages).each(function() {
            $('<img />').attr('src', this).appendTo('body').css('display', 'none');
        });
    }
    let i = 0;
    setInterval(() => {
        $("#image").fadeOut('fast', function() {
            $("#image").attr('src', '/assets/images/' + bgarr[i]);
            $("#image").fadeIn('fast');
        });
        if (i >= 2) {
            i = 0;
        } else {
            i++;
        }
    }, 4000);
});

var x = true;
document.getElementById('show-pass').onclick = () => {
    (x == true) ? document.getElementById('login-pass-inputbox').type = "text" : document.getElementById('login-pass-inputbox').type = "password";
    x = !x;
}