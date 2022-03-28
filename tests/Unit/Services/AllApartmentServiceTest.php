<?php

namespace Unit\Services;

use App\Services\Apartment\All\AllApartmentRequest;
use App\Services\Apartment\All\AllApartmentService;
use PHPUnit\Framework\TestCase;

class AllApartmentServiceTest extends TestCase
{
    public function testExecute()
    {
        $arr = new AllApartmentService();
        $this->assertIsArray($arr->execute(new AllApartmentRequest('arg')));
    }

}