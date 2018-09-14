<?php

namespace Controller;

use Core\Controller;
use Model\Book;

class BookController extends Controller
{
    public function indexAction()
    {
        $book = new Book();
        return $this->render('book/index.html.twig', [
            'books' => $book->getAll()
        ]);
    }

    public function createAction()
    {
        return $this->render('book/create.html.twig');
    }

    public function editAction($id)
    {
        return 'Edit #' . $id;
    }

    public function deleteAction($id)
    {
        return 'Delete #' . $id;
    }

    public function createPostAction()
    {
        $book = new Book();
        $book->create(
            $_POST['title'],
            $_POST['author'],
            $_POST['location']
        );

        header('Location: /');
    }
}