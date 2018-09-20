<?php

namespace Model;

use Core\Database;

class Book
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($title, $author, $location)
    {
        $query = 'INSERT INTO books (title, author, updated_at, location, created_at)
            VALUES (:title, :author, :updated_at, :location, :created_at)';

        return $this->db->query($query, [
            'title' => $title,
            'author' => $author,
            'location' => $location,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function edit($id, $title, $author, $location)
    {
        $query = 'UPDATE books
            SET title = :title, author = :author, location = :location, updated_at = :updated_at
            WHERE id = :id';

        return $this->db->query($query, [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'location' => $location,
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function delete($id)
    {
        $query = 'DELETE FROM books WHERE id = :id';

        return $this->db->query($query, [
            'id' => $id
        ]);
    }

    public function getOne($id)
    {
        $query = 'SELECT * FROM books WHERE id = :id';

        return $this->db->queryOne($query, [
            'id' => $id
        ]);
    }

    public function getAll()
    {
        $query = 'SELECT * FROM books ORDER BY id DESC';

        return $this->db->queryAll($query);
    }
}
