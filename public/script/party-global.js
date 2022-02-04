const playpauseIcon = $('#playpause-icon');
const volumeIcon = $('#volume-rocker');
const playpauseContainer = $('#playpause');
const upperContainer = $('#upper-container');
const lowerContainer = $('#lower-container');
var timer, vb;
var visible = true;
var DELAY = 300,
    rightclicks = 0,
    lefttclicks = 0,
    righttimer = null,
    lefttimer = null;

$(function() {
    visible = true;
    const video = $('#video');
    setTimeout(() => {
        playpauseContainer.fadeOut();
        upperContainer.fadeOut();
        lowerContainer.fadeOut();
        visible = false;
    }, 5000);

});

$('#start-playback').click(function(e) {
    e.preventDefault();
    let id = $('#video').attr('data-id');
    let time = video.currentTime;

    $('.update').load('../php-scripts/update-party-video-global.php', {
        vidID: id
    });
    $('#modal-container').hide();
    setInterval(() => {
        $('.updateplaypause').load('../php-scripts/party-global-playpause.php', {
            vidID: id
        });
        $('.updateseek').load('../php-scripts/party-global-seek.php', {
            vidID: id
        });
    }, 250);
});

$('#back-arrow').click(function(e) {
    window.location.href = 'home.php';
});

$('html').keydown(function(e) {
    let curr_volume = video.volume;
    let new_volume = curr_volume;
    if (e.keyCode == 38) {
        new_volume += 0.05;
        setVolume(new_volume);
    } else if (e.keyCode == 40) {
        new_volume -= 0.05;
        setVolume(new_volume);
    }
    $('#volume-slider').slider('value', new_volume * 100);
});

$("#volume-slider").slider({
    min: 0,
    max: 100,
    value: 100,
    range: "min",
    slide: function(event, ui) {
        setVolume(ui.value / 100);
    }
});

$("#brightness-slider").slider({
    min: 25,
    max: 100,
    value: 100,
    range: "min",
    slide: function(event, ui) {
        $('#video').css('filter', 'brightness(' + ui.value + '%)')
    }
});

function setVolume(vol) {
    video.volume = vol;
    if (vol > 0.50) {
        volumeIcon.removeClass('bx-volume-low');
        volumeIcon.removeClass('bx-volume-mute');
        volumeIcon.addClass('bx-volume-full')
    } else if (vol < 0.50 && vol > 0) {
        volumeIcon.removeClass('bx-volume-full');
        volumeIcon.removeClass('bx-volume-mute');
        volumeIcon.addClass('bx-volume-low')
    } else {
        volumeIcon.removeClass('bx-volume-full');
        volumeIcon.removeClass('bx-volume-low');
        volumeIcon.addClass('bx-volume-mute')
    }
}

$('#volume-button').click(function(e) {
    $('.volume').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();
});

$('#brightness-button').click(function(e) {
    $('.brightness').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();
});

$('.brightness').mouseleave(function() {
    vbButton = setTimeout(() => {
        $('.brightness').css('display', 'none');
        $('#brightness-button, #volume-button').fadeIn();
    }, 2000);
});

$('#volume-button').click(function(e) {
    $('.volume').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();
});

$('.volume').mouseleave(function() {
    vbButton = setTimeout(() => {
        $('.volume').css('display', 'none');
        $('#brightness-button, #volume-button').fadeIn();
    }, 2000);
});

$('.brightness').mouseenter(function() {
    clearTimeout(vbButton);
});

function format(s) {
    var m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}

video.ontimeupdate = function() {
    let partyID = $('')
    var percentage = (video.currentTime / video.duration) * 100;
    $("#custom-seekbar span").css("width", percentage + "%");
    var currtime = format(video.currentTime);
    $('#time').text(currtime);
    if (video.currentTime == video.duration - 1) {
        playpauseIcon.removeClass('bx-play');
        playpauseIcon.addClass('bx-pause');
    }
};


$('#fullscreen-button').click(function(e) {
    video.requestFullscreen();
});

$('body').mousemove(function(e) {
    // values: e.clientX, e.clientY, e.pageX, e.pageY
    playpauseContainer.show();
    upperContainer.show();
    lowerContainer.show();
    visible = true;
    clearTimeout(timer);
    timer = setTimeout(() => {
        playpauseContainer.fadeOut();
        upperContainer.fadeOut();
        lowerContainer.fadeOut();
        visible = false;

    }, 5000);
});


$('#menu-button').click(function() {
    $('#side-menu').css('right', 0);
})

$('#hide-button').click(function() {
    $('#side-menu').css('right', -300);
})

$('#party-button').click(function() {
    $('#start-button').slideToggle(100);
});

$("#copy-btn").click(function(e) {
    let copyText = $("#key");
    var temp = $("<input>");
    $("body").append(temp);
    temp.val(copyText.text()).select();
    document.execCommand("copy");
    temp.remove();
});