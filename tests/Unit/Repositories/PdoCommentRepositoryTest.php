<?php

namespace Repositories\Comment;

use App\Repositories\Comment\PdoCommentRepository;
use PHPUnit\Framework\TestCase;

class PdoCommentRepositoryTest extends TestCase
{
    public function testAll()
    {
        $arr = new PdoCommentRepository();
        $this->assertIsArray($arr->all());
    }

    public function testInsert()
    {
        $apartment_id = 10;
        $name = 'name';
        $comment = 'comment';
        $this->assertIsInt($apartment_id);
        $this->assertIsString($name);
        $this->assertIsString($comment);
        $a = new PdoCommentRepository();
        $this->assertNull($a->insert($apartment_id, $name, $comment));
    }

    public function testDeleteById()
    {
        $vars = ['id' => 10];
        $id = (int)$vars['id'];
        $this->assertIsInt($id);
        $a = new PdoCommentRepository();
        $this->assertNull($a->deleteById($vars));
    }

}
