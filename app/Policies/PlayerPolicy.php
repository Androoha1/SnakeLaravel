<?php
namespace App\Policies;

use App\Models\Player;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PlayerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Player $player)
    {
        return $user->id === $player->id;
    }

    public function delete(User $user, Player $player)
    {
        return $user->id === $player->id;
    }
}

