<?php

namespace Unit\Services;

use App\Services\Comment\All\AllCommentRequest;
use App\Services\Comment\All\AllCommentService;
use PHPUnit\Framework\TestCase;

class AllCommentServiceTest extends TestCase
{
    public function testExecute()
    {
        $arr = new AllCommentService();
        $this->assertIsArray($arr->execute(new AllCommentRequest()));
    }
}