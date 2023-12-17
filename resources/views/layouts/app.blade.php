<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Other head elements -->

    <!-- Include the Laravel Echo and Socket.IO library -->
    <script src="https://cdn.socket.io/3.0.3/socket.io.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script> <!-- Adjust the path if needed -->

    <!-- Include the Laravel WebSockets script -->
    <script src="{{ asset('vendor/laravel-websockets/js/websockets-dashboard.js') }}" defer></script>

    <!-- Other head elements -->
</head>
<body>
    <!-- Your body content -->

    <!-- Other body elements -->
</body>
</html>