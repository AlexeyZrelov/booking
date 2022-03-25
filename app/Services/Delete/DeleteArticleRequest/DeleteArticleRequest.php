<?php

namespace App\Services\Delete\DeleteArticleRequest;

class DeleteArticleRequest
{
    private int $id;
    private int $user_id;

    public function __construct(int $id, int $user_id=0)
    {
        $this->id = $id;
        $this->user_id = $user_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserId(): int
    {
        return $this->user_id;
    }



}