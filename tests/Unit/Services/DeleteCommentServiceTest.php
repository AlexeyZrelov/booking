<?php

namespace Unit\Services;

use App\Services\Comment\Delete\DeleteCommentRequest;
use App\Services\Comment\Delete\DeleteCommentService;
use PHPUnit\Framework\TestCase;

class DeleteCommentServiceTest extends TestCase
{
    public function testExecute()
    {
        $vars = ['id' => 10];
        $id = (int)$vars['id'];
        $this->assertIsInt($id);
        $a = new DeleteCommentService();
        $this->assertNull($a->execute(new DeleteCommentRequest($vars)));
    }
}