<?php

namespace App\Repositories\Booking;

use App\Models\Dbh;
use PDO;

class PdoBookingRepository implements BookingRepository
{
    public function allId(array $vars): array
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$vars['id']]);
        return $stmt1->fetchAll(PDO::FETCH_ASSOC);
    }

    public function priceId(array $vars): string
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$vars['id']]);
        $arr = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        return $arr[0]['booked'];
    }

    public function updateId(): void
    {
        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;
        $stmt = (new Dbh())->connect()->prepare('UPDATE booking SET name=?, address=?, arrival=?, departure=? WHERE apartment_id=?');
        $stmt->execute([$_POST['name'], $_POST['address'], $arrival, $departure, $_POST['apartment_id']]);
    }

}