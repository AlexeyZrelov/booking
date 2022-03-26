<?php

namespace App\Controllers;

use App\Redirect;
use App\Repositories\Comment\PdoCommentRepository;
use App\View;
use App\Models\Dbh;
use PDO;

class CommentController
{
    public function index(): View
    {
        $src = new PdoCommentRepository();
        $result = $src->all();

        return new View('Comment/index.html', [

//            'apartment_id' => $_POST['uid'],
            'results' => $result

        ]);
    }

    public function save(): Redirect
    {
        $src = new PdoCommentRepository();
        $src->insert();

        return new Redirect('/comments');
    }

    public function delete(array $vars): Redirect
    {
        $src = new PdoCommentRepository();
        $src->deleteById($vars);

        return new Redirect('/comments');
    }

}