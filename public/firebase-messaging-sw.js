

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');

importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');



/*

Initialize the Firebase app in the service worker by passing in the messagingSenderId.

* New configuration for app@pulseservice.com

*/

firebase.initializeApp({

         apiKey: "AIzaSyD5pLMswxRM8ylkyua2DHBCxlC0oycEXHk",
      authDomain: "pushnotification-879ac.firebaseapp.com",
      projectId: "pushnotification-879ac",
      storageBucket: "pushnotification-879ac.appspot.com",
      messagingSenderId: "617928981054",
      appId: "1:617928981054:web:5a661c7421267b13f92f6f",
      measurementId: "G-FCE3C620XB"

    });



/*

Retrieve an instance of Firebase Messaging so that it can handle background messages.

*/

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {

    console.log(

        "[firebase-messaging-sw.js] Received background message ",

        payload,

    );

    /* Customize notification here */

    const notificationTitle = "Background Message Title";

    const notificationOptions = {

        body: "Background Message body.",

        icon: "/itwonders-web-logo.png",

    };



    return self.registration.showNotification(

        notificationTitle,

        notificationOptions,

    );

});
