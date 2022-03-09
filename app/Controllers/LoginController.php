<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use App\Models\Dbh;
use PDO;

class LoginController
{

    public function index(): View
    {
        return new View('Login/index.html');
    }

    public function signup()
    {

        $stmt = (new Dbh())->connect()->prepare('INSERT INTO users (uid, email, password, created_at) VALUES (?, ?, ?, NOW())');

        if (!empty($_POST['uid']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {

            $pwd = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
            $stmt->execute([$_POST['uid'], $_POST['email'], $pwd]);

            $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM users WHERE uid = ? AND password = ?');
            $stmt1->execute([$_POST['uid'], $pwd]);
            $user = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['log_name'] = $user[0]['uid'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];

            return new View('Login/main.html', [
//
//                'uid' => $_POST['uid'],
//                'email' => $_POST['email']

                'uid' => $_SESSION['log_name'],
                'email' => $_SESSION['email']

            ]);

        }

        return new Redirect('/login');

    }

    public function login()
    {
        $stmt = (new Dbh())->connect()->prepare('SELECT password FROM users WHERE uid = ?');

        $stmt->execute(array($_POST['uid']));
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($_POST['pwd'], $pwdHashed[0]["password"]);

        if ($checkPwd == false) {
            $stmt = null;
            return new Redirect('/login');

        } elseif ($checkPwd == true) {
            $stmt = (new Dbh())->connect()->prepare('SELECT * FROM users WHERE uid = ? OR password = ?');

            if (!$stmt->execute(array($_POST['uid'], $_POST['pwd']))) {
                $stmt = null;
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['log_name'] = $user[0]['uid'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];
            $_SESSION['created_at'] = $user[0]['created_at'];

            // All apartment
            $stmt3 = (new Dbh())->connect()->prepare('SELECT * FROM apartment');
            $stmt3->execute();
            $allApartment = $stmt3->fetchAll(PDO::FETCH_ASSOC);

            return new View('Login/main.html', [

                'id' => $_SESSION['user_id'],
                'uid' => $_SESSION['log_name'],
                'email' => $_SESSION['email'],
                'date' => $_SESSION['created_at'],
                'apartments' => $allApartment

            ]);

        }
    }


}