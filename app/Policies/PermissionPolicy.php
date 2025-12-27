<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    /**
     * Create a new policy instance.
     */
    public function accessPermission(User $user, $permission)
    {
        return $user->hasPermission($permission);
    }
}
