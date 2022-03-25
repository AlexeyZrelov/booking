<?php

namespace App\Services\Delete\DeleteArticleService;

use App\Models\Dbh;
use App\Redirect;
use App\Services\Delete\DeleteArticleRequest\DeleteArticleRequest;

class DeleteArticleService
{

    public function exec(DeleteArticleRequest $r): Redirect
    {
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM comments WHERE id=?');
        $stmt->execute([$r->getId()]);
//        $stmt->execute([$r->getUserId()]);

        return new Redirect('/comments');
    }

}