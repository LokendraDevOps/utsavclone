<?php

namespace App\Policies;

use App\Models\GotraEntry;
use App\Models\User;

class GotraEntryPolicy
{
    public function update(User $user, GotraEntry $gotraEntry): bool
    {
        return $gotraEntry->user_id === $user->id;
    }

    public function delete(User $user, GotraEntry $gotraEntry): bool
    {
        return $gotraEntry->user_id === $user->id;
    }
}
