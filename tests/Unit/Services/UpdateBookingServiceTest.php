<?php

namespace Unit\Services;

use App\Services\Booking\Update\UpdateBookingRequest;
use App\Services\Booking\Update\UpdateBookingService;
use PHPUnit\Framework\TestCase;

class UpdateBookingServiceTest extends TestCase
{
    public function testExecute()
    {
        $name = 'name';
        $address = 'address';
        $arrival = 'arrival';
        $departure = 'departure';
        $apartment_id = 'apartment_id';

        $arr = new UpdateBookingService();
        $this->assertNull($arr->execute(new UpdateBookingRequest($name, $address, $arrival, $departure, $apartment_id)));
    }
}