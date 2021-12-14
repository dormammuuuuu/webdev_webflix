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
        var dbref = db.ref(`users/${user.uid}`);
        if(user) {
            dbref.once("value", snap => {
                var userData = snap.val();
                document.getElementById("user_name").innerHTML = userData.username;
            }).then(() => {
                loader.style.display = 'none';
                body_container.style.display = 'block';
            });
        };
    });
}

displayName();

logoutBtn.onclick = () => {
    firebase.auth().signOut();
}

user_name.onclick = () => {
    window.location = "USERSETTING.html";
}

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