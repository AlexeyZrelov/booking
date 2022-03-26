<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Booking\PdoBookingRepository;
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

        $src = new PdoBookingRepository();
        $result = $src->allId($vars);
        $price = $src->priceId($vars);

        $interval = Carbon::parse($arrival)->diffInDays($departure);
        $total = $interval * $price;

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

        $update = new PdoBookingRepository();
        $update->updateId();

        return new View('Booking/comments.html', [

            'apartment_id' => $_POST['apartment_id'],
            'name' =>  $_POST['name'],
            'address' => $_POST['address'],
            'arrival' => $arrival,
            'departure' => $departure,
            'total' => $_POST['booked']

        ]);

    }

//    public function delete(array $vars): Redirect
//    {
//        $stmt = (new Dbh())->connect()->prepare('DELETE FROM booking WHERE apartment_id=? AND arrival = ?');
//        $stmt->execute([$vars['id'], $_POST['arrival']]);
//
//        return new Redirect('/apartment/search');
//    }

}