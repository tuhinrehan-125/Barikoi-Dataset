<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/WebSocketController.php

use App\Events\UserDataEvent;
use Faker\Factory as FakerFactory;

class WebSocketController extends Controller
{
    public function index(Request $request)
    {
        // You can perform any logic here if needed
        return view('index');
    }

    public function broadcastUserData(Request $request)
    {
        // Assuming you have the Faker seeder class generated
        $faker = FakerFactory::create();

        // Generate and broadcast user data
        $userData = [];

        for ($i = 0; $i < 20000; $i++) {
            $userData[] = [
                'id' => $faker->uuid,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                // Add other fields as needed
            ];
        }

        // Broadcast user data to the 'user-data-channel'
        broadcast(new UserDataEvent($userData))->toOthers();

        // Log a message for debugging
        \Log::info('User data broadcasted successfully');

        // Delay for demonstration purposes (adjust as needed)
        usleep(500);

        return response()->json(['message' => 'User data broadcasted successfully']);
    }

    // public function websocketPage(Request $request){
    //     $token = $request->session()->get('token');

    //     return view('websocket-page');
    // }
    // Example in a controller method
    public function websocketPage(Request $request)
    {
        $token = $request->query('token');

        // Use the $token as needed
        // ...

        return view('web-socket')->with('token', $token);
    }

}

