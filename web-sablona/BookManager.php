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
            $query = "
                INSERT INTO books 
                    (title, authors, main_category, sub_category, price, currency, isbn, year, pages, recommendation, description, image_url) 
                VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ";

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
}
