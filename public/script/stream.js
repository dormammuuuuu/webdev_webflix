
const playpauseIcon = $('#playpause-icon');
const volumeIcon = $('#volume-rocker');
const playpauseContainer = $('#playpause');
const upperContainer = $('#upper-container');
const lowerContainer = $('#lower-container');
var timer, vb;
var visible = true;


$(function () {
    visible = true;
    const video = $('#video');
    setTimeout(() => {
        playpauseContainer.fadeOut();
        upperContainer.fadeOut();
        lowerContainer.fadeOut();
        visible = false;
    }, 5000);   
});

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
    $('.volume').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();
});

// $('#volume-slider, #brightness-slider').mouseleave(function () {         
//         $(this).fadeOut();
// });


$('#brightness-button').click(function (e) { 
    $('.brightness').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();    
});

$('.brightness').mouseleave(function () { 
    vbButton = setTimeout(() => {
        $('.brightness').css('display', 'none');
        $('#brightness-button, #volume-button').fadeIn();   
    }, 4000);
});

$('#volume-button').click(function (e) { 
    $('.volume').css('display', 'flex');
    $('#brightness-button, #volume-button').hide();    
});

$('.volume').mouseleave(function () { 
    vbButton = setTimeout(() => {
        $('.volume').css('display', 'none');
        $('#brightness-button, #volume-button').fadeIn();   
    }, 4000);
});

$('.brightness').mouseenter(function () { 
    clearTimeout(vbButton);
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

$('#fullscreen-button').click(function (e) { 
    video.requestFullscreen();
});

$('body').mousemove(function (e) { 
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

video.onclick = (e) => {
    
    if (visible == true){
        playpauseContainer.fadeOut();
        upperContainer.fadeOut();
        lowerContainer.fadeOut();
        visible = false;
    } else {
        playpauseContainer.show();
        upperContainer.show();
        lowerContainer.show();
        visible = true;
    }
    $('.volume').css('display', 'none');
    $('.brightness').css('display', 'none');
    $('#brightness-button, #volume-button').show();    
}