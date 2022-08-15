<?php

namespace App\Console\Commands;

use App\Events\api1Event;
use App\Events\api2Event;
use App\Models\User;
use Illuminate\Console\Command;

class BroadcastCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     *
     */
    public function handle():void
    {   $users = User::all();

        foreach($users as $user){

            broadcast(new api1Event($user->id));
        }

        foreach($users as $user){

            broadcast(new api2Event($user->id));
        }

    }
}
