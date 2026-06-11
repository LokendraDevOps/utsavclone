<?php

namespace App\Policies;

use App\Models\FamilyMember;
use App\Models\User;

class FamilyMemberPolicy
{
    public function update(User $user, FamilyMember $familyMember): bool
    {
        return $familyMember->user_id === $user->id;
    }

    public function delete(User $user, FamilyMember $familyMember): bool
    {
        return $familyMember->user_id === $user->id;
    }
}
