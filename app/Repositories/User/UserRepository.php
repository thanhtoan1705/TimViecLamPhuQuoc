<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository implements UserInterface
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }
}
