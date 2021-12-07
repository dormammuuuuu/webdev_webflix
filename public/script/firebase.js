var firebaseApp = {};

const firebaseConfig = {
    apiKey: "AIzaSyDt04IZzGmstIeFfxbiIw-oHdE0KBArrgs",
    authDomain: "streamhub-7924b.firebaseapp.com",
    projectId: "streamhub-7924b",
    storageBucket: "streamhub-7924b.appspot.com",
    messagingSenderId: "1079889960053",
    databaseURL: "https://streamhub-7924b-default-rtdb.asia-southeast1.firebasedatabase.app/",
    appId: "1:1079889960053:web:57db9718776779eb99ac3c",
    measurementId: "G-44NTBMWTYK"
  };

firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();
const db = firebase.database();
