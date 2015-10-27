<?php
class book extends CI_Model {
     function get_all_books()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM books")->result_array();
     }
     function get_book_by_id($book_id)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM books WHERE id = ?", array($book_id))->row_array();
     }
     function get_most_recent_book()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM books ORDER BY created_at DESC LIMIT 1")->row_array();
     }
     function add_book($book)
     {
        $this->load->helper('date');
         $query = "INSERT INTO books (title, author, created_at, updated_at) VALUES (?,?, NOW(),NOW())";
         $values = array($book['title'], $book['author']); 
         return $this->db->query($query, $values);
     }
     function all_books_with_reviews()
     {
        return $this->db->query("SELECT books.id, books.title, COUNT(reviews.id) AS reviews FROM books LEFT JOIN reviews ON books.id = reviews.book_id GROUP BY books.id HAVING reviews > 0")->result_array();
     }
}
?>