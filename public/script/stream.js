$(function () {
    const video = $('#video');
    video.prop('controls', '');    
});

const playpauseIcon = $('#playpause-icon');
const volumeIcon = $('#volume-rocker');

function playpause(){
    if(video.paused){
        video.play();
        playpauseIcon.removeClass('bx-play');
        playpauseIcon.addClass('bx-pause');
    } else {
        video.pause();
        playpauseIcon.removeClass('bx-pause');
        playpauseIcon.addClass('bx-play');
    }  
}

$('#playpause-button').click(function() {
     playpause();
});

$('#back-arrow').click(function (e) { 
    window.location.href= 'home.php';
});

$('body').keyup(function (e) { 
    if(e. keyCode == 32){
        playpause();
    }
});

$('body').keydown(function (e) { 
    let curr_volume = video.volume;
    let new_volume = curr_volume;
    if (e.keyCode == 38){
        new_volume += 0.05;
        setVolume(new_volume);
    } else if (e.keyCode == 40){
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
        $('#video').css('filter', 'brightness('+ ui.value +'%)')
    }
});

function setVolume(vol) {
    video.volume = vol;
    if (vol > 0.50){
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

$('#volume-button').click(function (e) { 
    $('#volume-slider').fadeIn();    
});

$('#volume-slider, #brightness-slider').mouseleave(function () {         
        $(this).fadeOut();
});

$('#volume-slider, #brightness-slider').mouseenter(function () { 
    $(this).show();
});

$('#brightness-button').click(function (e) { 
    $('#brightness-slider').fadeIn();    
});

function format(s) {
    var m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}

video.ontimeupdate = function(){
    var percentage = ( video.currentTime / video.duration ) * 100;
    $("#custom-seekbar span").css("width", percentage+"%");
    var currtime = format(video.currentTime);
    $('#time').text(currtime);
};

$("#custom-seekbar").on("click", function(e){
    var offset = $(this).offset();
    var left = (e.pageX - offset.left);
    var totalWidth = $("#custom-seekbar").width();
    var percentage = ( left / totalWidth );
    var vidTime = video.duration * percentage;
    video.currentTime = vidTime;
});


