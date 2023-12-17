import Echo from 'laravel-echo';

// Your custom dashboard configuration
const dashboard = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    // ... other configuration options
});

// Additional code for handling the WebSocket dashboard
// ...

export default dashboard;
