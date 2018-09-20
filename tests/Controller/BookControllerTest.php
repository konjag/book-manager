<?php

use PHPUnit\Framework\TestCase;
use Controller\BookController;

class BookControllerTest extends TestCase
{
    public function testIndexAction()
    {
        $controller = new BookController(
            $this->getTwigMock(),
            $this->getDbMock()
        );

        $this->assertTrue($controller->indexAction());
    }

    public function testEditAction()
    {
        $controller = new BookController(
            $this->getTwigMock(),
            $this->getDbMock()
        );

        $this->assertTrue($controller->editAction(123));
    }

    private function getTwigMock()
    {
        $twig = $this
              ->getmockbuilder('Core\Twig')
              ->setMethods(['render'])
              ->getMock();

        $twig
            ->method('render')
            ->will($this->returnValue(true));

        return $twig;
    }

    private function getDbMock()
    {
        $db = $this
            ->getMockBuilder('Core\Database')
            ->getMock();

        return $db;
    }

    private function getBookMock()
    {
        $book = $this
              ->getMockBuilder('Model\Book')
              ->setConstructorArgs([$this->getDbMock()])
              ->setMethods(['getAll', 'getOne'])
              ->getMock();

        $book
            ->method('getAll')
            ->will($this->returnValue(true));

        return $book;
    }
}
