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