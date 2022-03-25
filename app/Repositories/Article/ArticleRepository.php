<?php

namespace App\Repositories\Article;

use App\Services\Delete\DeleteArticleRequest\DeleteArticleRequest;

interface ArticleRepository
{
    public function delete(DeleteArticleRequest $req): void;
}