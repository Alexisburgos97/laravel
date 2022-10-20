<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Device;
use Illuminate\Auth\Access\HandlesAuthorization;

class DevicePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        //
//    }

    public function update(User $user, Device $device)
    {
        return $user->id === $device->user_id;
    }

}
