<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;

class UserChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public static function namePattern(): string
    {
        return "user.{id}";
    }

    public static function name($id): PrivateChannel
    {
        return new PrivateChannel( "user.$id");
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user,int $id)
    {
        return $user->id === $id;
    }
}
