var firebaseApp = {};

const firebaseConfig = {
    apiKey: "AIzaSyCKtMsOOvK-dF2dcYzyth-nvgcwyN6x-nA",
    authDomain: "streamhub-57802.firebaseapp.com",
    databaseURL: "https://streamhub-57802-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "streamhub-57802",
    storageBucket: "streamhub-57802.appspot.com",
    messagingSenderId: "154806697678",
    appId: "1:154806697678:web:91d6b6f5b0ed78e27dda9f",
    measurementId: "G-1M4KBZXWHD"
};

firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();
const db = firebase.database();
