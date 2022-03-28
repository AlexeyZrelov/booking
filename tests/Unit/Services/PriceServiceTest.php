<?php

namespace Unit\Services;

use App\Services\Booking\Price\PriceRequest;
use App\Services\Booking\Price\PriceService;
use PHPUnit\Framework\TestCase;

class PriceServiceTest extends TestCase
{
    public function testExecute()
    {
        $arr = new PriceService();
        $this->assertNotNull($arr->execute(new PriceRequest(array('id' => 10))));
    }
}