<?php

namespace Repositories\Apartment;

use App\Repositories\Apartment\PdoApartmentRepository;
use PHPUnit\Framework\TestCase;

class PdoApartmentRepositoryTest extends TestCase
{
    public function testInsert()
    {
        $title = 'title';
        $description = 'description';
        $address = 'address';
        $arrival = 'arrival';
        $departure = 'departure';
        $booked = '100';
        $this->assertNotNull($title);
        $this->assertNotNull($description);
        $this->assertNotNull($address);
        $this->assertNotNull($arrival);
        $this->assertNotNull($departure);
        $this->assertNotNull($booked);

        $a = new PdoApartmentRepository();
        $this->assertNull($a->insert($title, $description, $address, $arrival, $departure, $booked));
    }

    public function testAllBookingDeparture()
    {
        $arrival = 'string';
        $this->assertIsString($arrival);
        $a = new PdoApartmentRepository();
        $this->assertIsArray($a->allBookingDeparture($arrival));
    }
}
