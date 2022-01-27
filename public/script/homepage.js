var searchClear = $('.search-clear');
body_container.style.display = 'block';

$(function () {
    let clickButton = $('.swiper-button-next');
    setInterval(function() {
        clickButton.click();
    }, 6000);
});

$('#searchBox').on('input', function(){
    searchClear.css('visibility', 'visible');
    if (!$(this).val()){
        searchClear.css('visibility', 'hidden');
    }
});

searchClear.on('click', function(){
    $('#searchBox').val("");
    searchClear.css('visibility', 'hidden');
    $('.thumbnail-container').show();
});

$("#add-to-list").change(function(e) {
    e.stopPropagation();
    alert("STOP");
})

$('#logoutBtn').click(function() {
    $('#add').load('../php-scripts/logout.php')
})

//carousel

const swiper = new Swiper(".swiper", {
	// Optional parameters
	direction: "horizontal",
	loop: true,
	effect: "fade",
	fadeEffect: {
		crossFade: true
	},
	speed: 400,

	// If we need pagination
	/*pagination: {
    el: '.swiper-pagination',
  },*/

	// Navigation arrows
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev"
	}

	// And if we need scrollbar
	/*scrollbar: {
    el: '.swiper-scrollbar',
  },*/
});

$('input[name=categ_select]').on('change', function() {
    $('.thumbnail-container').hide();
    $('.' + $(this).val()).show();
    if ($(this).val() == 'All')
        $('.thumbnail-container').show();

})

$("#searchBox").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("[data-title]").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
});

$('.series-button').click(function (e) { 
    $('#list-movies').empty();
    $('.dropdown-container h1').text('Series List');
    $('#list-movies').load('../php-scripts/fetch-series.php');
});

$('.movies-button').click(function (e) { 
    $('#list-movies').empty();
    $('.dropdown-container h1').text('Movie List');
    $('#list-movies').load('../php-scripts/fetch-movies.php');
});

$('.list-button').click(function (e) { 
    $('#list-movies').empty();
    $('.dropdown-container h1').text('Favorites');
    $('#list-movies').load('../php-scripts/fetch-favorites.php');
});

$('.soon-button').click(function (e) { 
    $('#list-movies').empty();
    $('.dropdown-container h1').text('Coming Soon');
    $('#list-movies').load('../php-scripts/fetch-soon.php');
});