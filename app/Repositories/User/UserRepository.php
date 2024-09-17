<?php

namespace App\Repositories\User;

use App\Models\Candidate;
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

    public function createOrUpdateGoogleUser(array $data)
    {
        $user = $this->user->where('email', $data['email'])
            ->orWhere('google_id', $data['google_id'])
            ->first();

        if ($user) {
            $user->update([
                'google_id' => $data['google_id'],
                'avatar_url' => $data['avatar_url'],
            ]);
        } else {
            $user = $this->create($data);
        }

        if ($user) {
            Candidate::create([
                'user_id' => $user->id,
            ]);
        }

        return $user;
    }


}
