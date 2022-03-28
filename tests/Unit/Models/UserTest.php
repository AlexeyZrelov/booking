<?php

namespace Unit\Models;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUser()
    {
        $id = 10;
        $uid = 'uid';
        $email = 'email';
        $password = 'pwd';
        $created_at = 'cr_at';

        $a = new User($id, $uid, $email, $password, $created_at);
        $this->assertIsObject($a);
    }
}