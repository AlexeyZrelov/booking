<?php

namespace App\Services\Login\AllUsersPassword;

class AllUsersPasswordRequest
{
    private string $uid;
    private string $password;

    public function __construct(string $uid, string $password)
    {
        $this->uid = $uid;
        $this->password = $password;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}