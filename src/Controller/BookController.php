<?php

namespace Controller;

use Core\Controller;
use Model\Book;

class BookController extends Controller
{
    public function indexAction()
    {
        $book = new Book($this->db);
        return $this->render('book/index.html.twig', [
            'title' => 'Books list',
            'books' => $book->getAll()
        ]);
    }

    public function createAction()
    {
        return $this->render('book/create.html.twig', [
            'title' => 'New book'
        ]);
    }

    public function editAction($id)
    {
        $book = new Book($this->db);
        $book = $book->getOne($id);

        return $this->render('book/edit.html.twig', [
            'title' => 'Editing book "' . $book['title'] . '" by ' . $book['author'],
            'book' => $book
        ]);
    }

    public function deleteAction($id)
    {
        var_dump($id);
        $book = new Book($this->db);
        $book->delete($id);

        header('Location: /');
    }


    public function createPostAction()
    {
        $book = new Book($this->db);
        $book->create(
            $_POST['title'],
            $_POST['author'],
            $_POST['location']
        );

        header('Location: /');
    }

    public function editPostAction($id)
    {
        $book = new Book($this->db);
        $book->edit(
            $id,
            $_POST['title'],
            $_POST['author'],
            $_POST['location']
        );

        header('Location: /');
    }
}
