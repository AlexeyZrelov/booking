<?php

namespace App\Repositories\Comment;

interface CommentRepository
{
    public function all(): array;
    public function insert(): void;
    public function deleteById(array $vars): void;
}