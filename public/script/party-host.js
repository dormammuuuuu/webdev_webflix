const playpauseIcon = $('#playpause-icon');
const volumeIcon = $('#volume-rocker');
const playpauseContainer = $('#playpause');
const upperContainer = $('#upper-container');
const lowerContainer = $('#lower-container');
let timer, vb;
let visible = true;
let DELAY = 300,
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



function playpause() {
    let status;
    let id = $('#video').attr('data-id');
    if (video.paused) {
        video.play();
        status = "play";
        playpauseIcon.removeClass('bx-play');
        playpauseIcon.addClass('bx-pause');
        $('.updateplaypause').load('../php-scripts/party-host-playpause.php', {
            status: status,
            vidID: id
        });
    } else {
        video.pause();
        status = "pause";
        playpauseIcon.removeClass('bx-pause');
        playpauseIcon.addClass('bx-play');
        $('.updateplaypause').load('../php-scripts/party-host-playpause.php', {
            status: status,
            vidID: id
        });
    }
}

$('#playpause-button').click(function() {
    playpause();
});

$('#back-arrow').click(function(e) {
    window.location.href = 'home.php';
});

$('html').keyup(function(e) {
    if (e.keyCode == 32) {
        playpause();
    }
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
    } else if (e.keyCode == 37) {
        video.currentTime -= 10;
    } else if (e.keyCode == 39) {
        video.currentTime += 10;
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
    let m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}

video.ontimeupdate = function() {
    let partyID = $('')
    let percentage = (video.currentTime / video.duration) * 100;
    $("#custom-seekbar span").css("width", percentage + "%");
    let currtime = format(video.currentTime);
    $('#time').text(currtime);
    if (video.currentTime == video.duration - 1) {
        playpauseIcon.removeClass('bx-play');
        playpauseIcon.addClass('bx-pause');
    }

    let id = $('#video').attr('data-id');
    let time = video.currentTime;

    $('.update').load('../php-scripts/update-party-video.php', {
        vidTime: time,
        vidID: id
    });

};

$("#custom-seekbar").on("click", function(e) {
    let offset = $(this).offset();
    let id = $('#video').attr('data-id');
    let left = (e.pageX - offset.left);
    let totalWidth = $("#custom-seekbar").width();
    let percentage = (left / totalWidth);
    let vidTime = video.duration * percentage;
    video.currentTime = vidTime;
    $('.updateseek').load('../php-scripts/party-host-seek.php', {
        seek: vidTime,
        vidID: id
    });
    setTimeout(() => {
        $('.updateseek').load('../php-scripts/party-all-seek.php', {
            vidID: id
        });
    }, 1500);
});

$('#fullscreen-button').click(function(e) {
    video.requestFullscreen();
});

$('body').mousemove(function(e) {
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

$('#left-previous').click(function() {
    lefttclicks++; //count clicks
    if (lefttclicks === 1) {
        lefttimer = setTimeout(function() {
            if (visible == true) {
                playpauseContainer.hide();
                upperContainer.hide();
                lowerContainer.hide();
                visible = false;
            } else {
                playpauseContainer.show();
                upperContainer.show();
                lowerContainer.show();
                visible = true;
            } //perform single-click action    
            lefttclicks = 0; //after action performed, reset counter
        }, DELAY);
    } else {
        clearTimeout(lefttimer); //prevent single-click action
        video.currentTime -= 10; //perform double-click action
        lefttclicks = 0; //after action performed, reset counter
        let id = $('#video').attr('data-id');
        let vidTime = video.currentTime;
        $('.updateseek').load('../php-scripts/party-host-seek.php', {
            seek: vidTime,
            vidID: id
        });
        setTimeout(() => {
            $('.updateseek').load('../php-scripts/party-all-seek.php', {
                vidID: id
            });

        }, 1000);
    }
}).on("dblclick", function(e) {
    e.preventDefault(); //cancel system double-click event
});


$('#right-forward').click(function() {
    rightclicks++; //count clicks
    if (rightclicks === 1) {
        righttimer = setTimeout(function() {
            if (visible == true) {
                playpauseContainer.hide();
                upperContainer.hide();
                lowerContainer.hide();
                visible = false;
            } else {
                playpauseContainer.show();
                upperContainer.show();
                lowerContainer.show();
                visible = true;
            } //perform single-click action    
            rightclicks = 0; //after action performed, reset counter
        }, DELAY);
    } else {
        clearTimeout(righttimer); //prevent single-click action
        video.currentTime += 10; //perform double-click action
        rightclicks = 0; //after action performed, reset counter
        let id = $('#video').attr('data-id');
        let vidTime = video.currentTime;
        $('.updateseek').load('../php-scripts/party-host-seek.php', {
            seek: vidTime,
            vidID: id
        });
        setTimeout(() => {
            $('.updateseek').load('../php-scripts/party-all-seek.php', {
                vidID: id
            });
        }, 1000);
    }
}).on("dblclick", function(e) {
    e.preventDefault(); //cancel system double-click event
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
    let temp = $("<input>");
    $("body").append(temp);
    temp.val(copyText.text()).select();
    document.execCommand("copy");
    temp.remove();
});