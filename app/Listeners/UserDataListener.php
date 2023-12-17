<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
// app/Listeners/UserDataListener.php

use App\Events\UserDataEvent;


class UserDataListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UserDataEvent $event)
    {
        broadcast(new UserDataEvent($event->userData))->toOthers();
    }
}

