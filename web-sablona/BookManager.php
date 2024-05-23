<?php

require_once 'include/dbConnection.php'; // Připojení k souboru s třídou pro práci s databází

class BookManager
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function save($bookData)
    {
        try {
            if (!empty($bookData["book_id"])) {
                $bookData["book_id"] = $this->db->getConnection()->real_escape_string($bookData["book_id"]);
            }

            $bookData['title'] = $this->db->getConnection()->real_escape_string($bookData['title']);
            $bookData['authors'] = $this->db->getConnection()->real_escape_string($bookData['authors']);
            $bookData['main_category'] = $this->db->getConnection()->real_escape_string($bookData['main_category']);
            $bookData['sub_category'] = $this->db->getConnection()->real_escape_string($bookData['sub_category']);
            $bookData['price'] = $this->db->getConnection()->real_escape_string($bookData['price']);
            $bookData['currency'] = $this->db->getConnection()->real_escape_string($bookData['currency']);
            $bookData['isbn'] = $this->db->getConnection()->real_escape_string($bookData['isbn']);
            $bookData['year'] = $this->db->getConnection()->real_escape_string($bookData['year']);
            $bookData['pages'] = $this->db->getConnection()->real_escape_string($bookData['pages']);
            $bookData['recommendation'] = $this->db->getConnection()->real_escape_string($bookData['recommendation']);
            $bookData['description'] = $this->db->getConnection()->real_escape_string($bookData['description']);
            $bookData['image_url'] = $this->db->getConnection()->real_escape_string($bookData['image_url']);

            // prepare sql query with params and then statement bind
            if (!empty($bookData["book_id"])) {
                $query = "
                    UPDATE books 
                    SET 
                        title = ?, 
                        authors = ?, 
                        main_category = ?, 
                        sub_category = ?, 
                        price = ?, 
                        currency = ?, 
                        isbn = ?, 
                        year = ?, 
                        pages = ?, 
                        recommendation = ?, 
                        description = ?, 
                        image_url = ?
                    WHERE 
                        book_id = '" . $bookData["book_id"] . "'";
            } else {
                $query = "
                    INSERT INTO books 
                        (title, authors, main_category, sub_category, price, currency, isbn, year, pages, recommendation, description, image_url) 
                    VALUES 
                        (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                ";
            }

            $stmt = $this->db->getConnection()->prepare($query);
            $stmt->bind_param(
                'ssssdssiisss',
                $bookData['title'],
                $bookData['authors'],
                $bookData['main_category'],
                $bookData['sub_category'],
                $bookData['price'],
                $bookData['currency'],
                $bookData['isbn'],
                $bookData['year'],
                $bookData['pages'],
                $bookData['recommendation'],
                $bookData['description'],
                $bookData['image_url']
            );

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAllBooks()
    {
        $result = $this->db->getConnection()->query("SELECT * FROM books");
        $books = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
        }

        return $books;
    }

    public function getBook(int $book_id)
    {
        $book_id = $this->db->getConnection()->real_escape_string($book_id);
        $result = $this->db->getConnection()->query("SELECT * FROM books WHERE book_id = '$book_id'");

        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
