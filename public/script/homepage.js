var mainApp = {};
(function() {
    var uid = null;
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            uid = user.uid;
        } else {
            uid = null;
            window.location.replace("index.html");
        }
      });
      function logout() {
        firebase.auth().signOut();
    }
    mainApp.logout = logout;
})();

function displayName() {
    firebase.auth().onAuthStateChanged(user => {
        var user = auth.currentUser;
        let dbref = db.ref(`users/${user.uid}`);
        if(user) {
            dbref.once("value", snap => {
                var userData = snap.val();
                // document.getElementById("user_name").innerHTML = userData.username;
            }).then(() => {
                loader.style.display = 'none';
                body_container.style.display = 'block';
            });
        };
    });
}

displayName();

function displayMovie(title, movie, rate, thumbnailImage, restriction, year, category){
    let container = document.getElementById('list-movies');
    let thumbnailContainer = document.createElement('div');
    thumbnailContainer.setAttribute('class', 'thumbnail-container '+ category);
    thumbnailContainer.setAttribute('data-movie', movie);
    thumbnailContainer.setAttribute('onclick', 'selectedMovie(this)');
    container.appendChild(thumbnailContainer);

    //Add the Thumbnail
    let thumbnail = document.createElement('img');
    thumbnail.setAttribute('class', 'thumbnail');
    thumbnail.setAttribute('src', thumbnailImage);
    thumbnailContainer.appendChild(thumbnail);

    //Add div thumbnail-description
    let thumbnailDescription = document.createElement('div');
    thumbnailDescription.setAttribute('class', 'thumbnail-description');
    thumbnailContainer.appendChild(thumbnailDescription);

    //Add empty div
    let div = document.createElement('div');
    thumbnailDescription.appendChild(div);

    //Add contents
    let thumbnailTitle = document.createElement('p');
    thumbnailTitle.setAttribute('class','thumbnail-title');
    thumbnailTitle.innerHTML = title;
    div.appendChild(thumbnailTitle);

    //Add year
    let thumbnailRuntimeYear = document.createElement('p');
    thumbnailRuntimeYear.setAttribute('class','thumbnail-runtime-year');
    thumbnailRuntimeYear.innerHTML = year;
    div.appendChild(thumbnailRuntimeYear);    

    //Create div for rating
    let thumbnailRating = document.createElement('div');
    thumbnailRating.setAttribute('class','thumbnail-rating');
    div.appendChild(thumbnailRating);

    //Add rating to div
    let spanRestriction = document.createElement('span');
    spanRestriction.setAttribute('class','restriction');
    spanRestriction.innerHTML = restriction;
    thumbnailRating.appendChild(spanRestriction);    

    //Add star icon
    let star = document.createElement('i');
    star.setAttribute('class','fas fa-star thumbnail-star');
    thumbnailRating.appendChild(star);    

    //Add rating number
    let rating = document.createElement('p');
    rating.innerHTML = rate;
    thumbnailRating.appendChild(rating);    

    //Create container for heart button
    let thumbnailAddWatchlist = document.createElement('div');
    thumbnailAddWatchlist.setAttribute('class','thumbnail-add-watchlist');
    thumbnailDescription.appendChild(thumbnailAddWatchlist);
    
    let heart = document.createElement('i');
    heart.setAttribute('class','bx bxs-heart');
    thumbnailAddWatchlist.appendChild(heart);
    
}


function fetchMovieList(){
    let dbref = db.ref('movies');
    dbref.once('value', snap => {
        snap.forEach(
            function(ChildSnapshot){
                let movie = ChildSnapshot.key;
                let title = ChildSnapshot.val().title;
                let rate = ChildSnapshot.val().rating;
                let restriction = ChildSnapshot.val().restriction;
                let thumbnail = ChildSnapshot.val().thumbnail;
                let year = ChildSnapshot.val().year;
                let category = ChildSnapshot.val().category;
                displayMovie(title, movie, rate, thumbnail, restriction, year, category);
            }     
        );
    });
}

fetchMovieList();

$('.log_out').on('click', function () {
    firebase.auth().signOut(); 
})

// user_name.onclick = () => {
//     window.location = "USERSETTING.html";
// }

var searchClear = $('.search-clear');

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

function selectedMovie(e){
    let loader = $('.loading-wrapper');
    let modalPreview = $('.modal-preview');
    let modalContainer = $('.modal-container');
    modalPreview.show();
    loader.show();
    modalContainer.hide();
    let modalTitle = $('#modal-title');
    let modalRating = $('#modal-rating');
    let modalCast = $('#modal-cast');
    let modalRestriction = $('#modal-restriction');
    let modalYear = $('#modal-year');
    let modalGenre = $('#modal-genre');
    let modalThumbnail = $('#modal-movie-thumbnail');
    let dbref = db.ref('movies/' + e.dataset.movie);
    dbref.once('value', snap => {
        modalTitle.text(snap.val().title);
        modalRestriction.text(snap.val().restriction);
        modalYear.text(snap.val().year);
        modalCast.text(snap.val().cast);
        modalGenre.text(snap.val().category);
        modalRating.text(snap.val().rating);
        modalThumbnail.attr('src', snap.val().thumbnail);
    }).then(() => {
        loader.hide();
        modalContainer.show();
    });


}

$('#modal-close').on('click', function() {
    let modalPreview = $('.modal-preview');
    modalPreview.fadeOut();
})