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

        $stmt = (new Dbh())->connect()->prepare('INSERT INTO apartment (title, description, address, arrival, departure) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$_POST['title'], $_POST['description'], $_POST['address'], $_POST['arrival'], $_POST['departure']]);

        return new View('Apartment/show.html', [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'address' => $_POST['address'],
            'arrival' => $_POST['arrival'],
            'departure' => $_POST['departure']
        ]);
    }


    public function search(): View
    {
//
//        echo "<pre>";
//        print_r($_POST);

//        $sql = "SELECT * FROM booking WHERE ($booking_from  BETWEEN date_from AND date_to) OR ($booking_to BETWEEN date_from AND date_to)";

        $stmt = (new Dbh())->connect()->prepare('SELECT * FROM apartment WHERE arrival >= ? AND departure < ?');
//        $stmt->execute(array($_POST['arrival'], $_POST['departure']));
        $stmt->execute([$_POST['arrival'], $_POST['departure']]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return new View('Login/main.html', [

            'id' => $_SESSION['user_id'],
            'uid' => $_SESSION['log_name'],
            'email' => $_SESSION['email'],
            'date' => $_SESSION['created_at'],
            'arrival' => $_POST['arrival'],
            'departure' => $_POST['departure'],
            'results' => $result

        ]);
    }

}