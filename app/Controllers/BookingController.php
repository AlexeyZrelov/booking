<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use App\Models\Dbh;
use Carbon\Carbon;
use PDO;

class BookingController
{
    public function index(array $vars): View
    {

        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$vars['id']]);
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        $interval = Carbon::parse($arrival)->diffInDays($departure);
        $total = $interval * $result[0]['booked'];

        return new View('Booking/index.html', [

            'arrival' => $arrival,
            'departure' => $departure,
            'total' => $total,
            'results' => $result

        ]);
    }

    public function save(): View
    {
        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $stmt = (new Dbh())->connect()->prepare('UPDATE booking SET name=?, address=?, arrival=?, departure=? WHERE apartment_id=?');
        $stmt->execute([$_POST['name'], $_POST['address'], $arrival, $departure, $_POST['apartment_id']]);

        return new View('Booking/comments.html', [

            'apartment_id' => $_POST['apartment_id'],
            'name' =>  $_POST['name'],
            'address' => $_POST['address'],
            'arrival' => $arrival,
            'departure' => $departure,
            'total' => $_POST['booked']

        ]);

    }

    public function delete(array $vars): Redirect
    {
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM booking WHERE apartment_id=? AND arrival = ?');
        $stmt->execute([$vars['id'], $_POST['arrival']]);

        return new Redirect('/apartment/search');
    }

}