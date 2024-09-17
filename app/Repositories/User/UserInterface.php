<?php

namespace App\Repositories\User;

interface UserInterface
{
    public function create(array $data);

    public function createOrUpdateGoogleUser(array $googleUserData);

}
