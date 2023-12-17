<!-- resources/views/websocket.blade.php -->

@extends('layouts.app')

@section('content')
    <div id="app">
        <h1>WebSocket Example</h1>
        <ul id="messages-list"></ul>
    </div>

    <script>
        // Include the token as a meta tag
        document.head.innerHTML += '<meta name="jwt-token" content="{{ $token }}">';
    </script>
    <script src="{{ asset('js/websocket.js') }}"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/websockets-dashboard.js') }}"></script>

@endsection
