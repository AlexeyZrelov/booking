<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use App\Models\Dbh;
use PDO;

class BookingController
{
    public function index(array $vars): View
    {

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');
        $stmt1->execute([$vars['id']]);
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        return new View('Booking/index.html', [

            'arrival' => $_POST['arrival'],
            'departure' => $_POST['departure'],
            'results' => $result

        ]);
    }

    public function save(): View
    {

        $stmt = (new Dbh())->connect()->prepare('INSERT INTO booking (apartment_id, name, address, arrival, departure, booked) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$_POST['apartment_id'], $_POST['name'], $_POST['address'], $_POST['arrival'], $_POST['departure'], $_POST['booked']]);

        return new View('Booking/comments.html', [

            'apartment_id' => $_POST['apartment_id'],
            'name' =>  $_POST['name'],
            'address' => $_POST['address'],
            'arrival' => $_POST['arrival'],
            'departure' => $_POST['departure'],
            'booked' => $_POST['booked']

        ]);

    }

    public function delete(array $vars): Redirect
    {
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM booking WHERE apartment_id=? AND arrival = ?');
        $stmt->execute([$vars['id'], $_POST['arrival']]);

        return new Redirect('/apartment/search');
    }

}