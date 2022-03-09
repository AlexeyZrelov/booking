<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use App\Models\Dbh;
use PDO;

class ApartmentController
{
    public function index(): View
    {

        return new View('Apartment/index.html');
    }

    public function show(array $vars): View
    {

        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

//        $stmt = (new Dbh())->connect()->prepare('INSERT INTO apartment (title, description, address, arrival, departure) VALUES (?, ?, ?, ?, ?)');
//        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['address'], $_POST['arrival'], $_POST['departure']]);

        $stmt = (new Dbh())->connect()->prepare('INSERT INTO apartment (title, description, address, arrival, departure, booked) VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['address'], $arrival, $departure, $_POST['booked']]);

//        STR_TO_DATE($_POST['departure'], "%m-%d-%Y")

        return new View('Apartment/show.html', [

            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'address' => $_POST['address'],
            'arrival' => $arrival,
            'departure' => $departure

        ]);
    }

    public function search(): View
    {

        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM booking WHERE departure <= ?');
        $stmt1->execute(array($arrival));
        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        // Apartment
        $stmt2 = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE id = ?');

        $result = [];
        foreach ($result1 as $v) {
            $stmt2->execute(array($v['apartment_id']));
            $result[] = $stmt2->fetchAll(PDO::FETCH_ASSOC)[0];
        }

        return new View('Login/main.html', [

            'id' => $_SESSION['user_id'],
            'uid' => $_SESSION['log_name'],
            'email' => $_SESSION['email'],
            'date' => $_SESSION['created_at'],
            'arrival' => $arrival,
            'departure' => $departure,
            'results' => $result

        ]);
    }

}