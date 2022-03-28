<?php

namespace Unit\Services;

use App\Services\Booking\All\AllBookingRequest;
use App\Services\Booking\All\AllBookingService;
use PHPUnit\Framework\TestCase;

class AllBookingServiceTest extends TestCase
{
    public function testExecute()
    {
        $arr = new AllBookingService();
        $this->assertIsArray($arr->execute(new AllBookingRequest(['id' => 1 ])));
    }
}