<?php

namespace App\Repositories\Booking;

interface BookingRepository
{
    public function allId(array $vars): array;
    public function priceId(array $vars): string;
    public function updateId(): void;
}