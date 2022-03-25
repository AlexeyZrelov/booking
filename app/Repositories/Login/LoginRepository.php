<?php

namespace App\Repositories\Login;

use App\Models\User;

interface LoginRepository
{
    public function insert($pwd): void;
    public function allUsers(): User;
    public function allUsersPassword($pwd): User;
    public function allApartment(): array;
    public function password(): bool;
}