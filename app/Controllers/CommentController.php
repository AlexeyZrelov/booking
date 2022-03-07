<?php

namespace App\Controllers;

use App\Redirect;
use App\View;
use App\Models\Dbh;
use PDO;

class CommentController
{
    public function index(): View
    {
        $stmt1 = (new Dbh())->connect()->prepare('SELECT * FROM comments');
        $stmt1->execute();
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        return new View('Comment/index.html', [

//            'apartment_id' => $_POST['uid'],
            'results' => $result

        ]);
    }

    public function save(): Redirect
    {

        $stmt = (new Dbh())->connect()->prepare('INSERT INTO comments (apartment_id, name, comment, date) VALUES (?, ?, ?, NOW())');
        $stmt->execute([$_POST['apartment_id'], $_POST['name'], $_POST['comment']]);

        return new Redirect('/comments');
    }

    public function delete(array $vars): Redirect
    {
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM comments WHERE id=?');
        $stmt->execute([$vars['id']]);

        return new Redirect('/comments');
    }

}