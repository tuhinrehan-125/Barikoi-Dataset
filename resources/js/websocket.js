// resources/js/websocket.js

import Echo from "laravel-echo";

// Retrieve token from the Blade view
const token = document.querySelector('meta[name="jwt-token"]').getAttribute('content');

// Instantiate Echo
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http://localhost:8000', // Replace with your WebSocket server URL
});

// Set the JWT token in the headers
window.Echo.connector.socket.options.auth = {
    headers: {
        Authorization: 'Bearer ' + token,
    },
};

// Listen to the desired channel and update the content
window.Echo.channel('user-data-channel')
    .listen('UserDataEvent', (data) => {
        console.log('Received data:', data);

        // Update the content inside the #app element based on WebSocket data
        document.getElementById('app').innerHTML = '<p>' + data.message + '</p>';
    });
