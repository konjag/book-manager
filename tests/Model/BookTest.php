<?php

use PHPUnit\Framework\TestCase;
use Model\Book;

class BookTest extends TestCase
{
    public function testCreate()
    {
        $book = new Book($this->getDbMock());
        $result = $book->create('title', 'author', 'location');

        $this->assertTrue($result);
    }

    public function testDelete()
    {
        $book = new Book($this->getDbMock());
        $result = $book->delete(1);

        $this->assertTrue($result);
    }

    private function getDbMock()
    {
        $db = $this
            ->getMockBuilder('Core\Database')
            ->getMock();

        $db
            ->method('query')
            ->will($this->returnValue(true));

        return $db;
    }
}
