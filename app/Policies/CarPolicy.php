<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Car;

class CarPolicy
{
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Car $car)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Car $car)
    {
        return $user->isAdmin();
    }
}
