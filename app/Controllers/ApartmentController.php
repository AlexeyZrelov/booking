<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Apartment\PdoApartmentRepository;
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

        $apartment = new PdoApartmentRepository();
        $apartment->insert();

        return new View('Apartment/show.html', [

            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'address' => $_POST['address'],
            'arrival' => $arrival,
            'departure' => $departure,
            'price' => $_POST['booked']

        ]);
    }

    public function search(): View
    {

        $arrival = $_POST['arrival'] ?? null;
        $departure = $_POST['departure'] ?? null;

        $src = new PdoApartmentRepository();
        $result = $src->allBookingDeparture();

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