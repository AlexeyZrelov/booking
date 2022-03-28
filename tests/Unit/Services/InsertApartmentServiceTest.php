<?php

namespace Unit\Services;

use App\Services\Apartment\Insert\InsertApartmentRequest;
use App\Services\Apartment\Insert\InsertApartmentService;
use PHPUnit\Framework\TestCase;

class InsertApartmentServiceTest extends TestCase
{
    public function testExecute()
    {
        $arr = new InsertApartmentService();
        $this->assertNull($arr->execute(new InsertApartmentRequest('title', 'description', 'address', 'arrival', 'departure', 'booked')));
    }
}