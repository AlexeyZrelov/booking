<?php

namespace Repositories\Login;

use App\Repositories\Login\PdoLoginRepository;
use PHPUnit\Framework\TestCase;

class PdoLoginRepositoryTest extends TestCase
{
    public function testAllUsers()
    {
        $uid = 'uid';
        $pwd = 'pwd';
        $this->assertIsString($uid);
        $this->assertIsString($pwd);
    }

    public function testAllUsersPassword()
    {
        $uid = 'uid';
        $pwd = 'pwd';
        $this->assertIsString($uid);
        $this->assertIsString($pwd);
    }

    public function testAllApartment()
    {
        $arr = new PdoLoginRepository();
        $this->assertIsArray($arr->allApartment());
    }

}
