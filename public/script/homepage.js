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
    var user = auth.currentUser;
    var dbref = db.ref(`users/${user.uid}`);
    firebase.auth().onAuthStateChanged(user => {
        if(user) {
            dbref.once("value", snap => {
                var userData = snap.val();
                document.getElementById("user_name").innerHTML = userData.username;
            })
        };
    });
}

setTimeout(() => {
    displayName();
}, 500);

logoutBtn.onclick = () => {
    firebase.auth().signOut();
}

user_name.onclick = () => {
    window.location = "USERSETTING.html";
}