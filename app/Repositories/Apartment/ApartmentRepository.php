<?php

namespace App\Repositories\Apartment;

interface ApartmentRepository
{
    public function insert(): void;
    public function allBookingDeparture(): array;
}