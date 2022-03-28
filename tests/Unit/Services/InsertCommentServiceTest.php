<?php

namespace Unit\Services;

use App\Services\Comment\Insert\InsertCommentRequest;
use App\Services\Comment\Insert\InsertCommentService;
use PHPUnit\Framework\TestCase;

class InsertCommentServiceTest extends TestCase
{
    public function testExecute()
    {
        $apartment_id = 10;
        $name = 'name';
        $comment = 'comment';
        $a = new InsertCommentService();
        $this->assertNull($a->execute(new InsertCommentRequest($apartment_id, $name, $comment)));
    }
}