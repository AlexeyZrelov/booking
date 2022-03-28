<?php

namespace Repositories\Booking;

use App\Repositories\Booking\PdoBookingRepository;
use PHPUnit\Framework\TestCase;

class PdoBookingRepositoryTest extends TestCase
{
    public function testAllId()
    {
        $vars = ['id' => 10];
        $id = (int)$vars['id'];
        $this->assertIsInt($id);
        $arr = new PdoBookingRepository();
        $this->assertIsArray($arr->allId($vars));
    }

    public function testPriceId()
    {
        $vars = ['id' => 10];
        $id = (int)$vars['id'];
        $this->assertIsInt($id);
        $arr = new PdoBookingRepository();
        $this->assertIsString($arr->priceId($vars));
    }

    public function testUpdateId()
    {
        $name = 'name';
        $address = 'address';
        $arrival = 'arrival';
        $departure = 'departure';
        $apartment_id = 'apartment_id';
        $this->assertIsString($name);
        $this->assertIsString($address);
        $this->assertIsString($arrival);
        $this->assertIsString($departure);
        $this->assertIsString($apartment_id);

        $a = new PdoBookingRepository();
        $this->assertNull($a->updateId($name, $address, $arrival, $departure, $apartment_id));
    }
}
