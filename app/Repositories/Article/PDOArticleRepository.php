<?php

namespace App\Repositories\Article;

use App\Models\Dbh;
use App\Services\Delete\DeleteArticleRequest\DeleteArticleRequest;

class PDOArticleRepository implements ArticleRepository
{

    public function delete(DeleteArticleRequest $req): void
    {
        $stmt = (new Dbh())->connect()->prepare('DELETE FROM comments WHERE id=?');
        $stmt->execute([$req->getId()]);
    }
}