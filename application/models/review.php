<?php
class review extends CI_Model {
     function get_all_reviews()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM reviews ORDER BY created_at")->result_array();
     }
     function get_review_by_user_id($user_id)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM reviews WHERE user_id = ?", array($user_id))->row_array();
     }
     function get_review_by_id($review_id)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM reviews WHERE id = ?", array($review_id))->row_array();
     }
     function get_most_recent_review()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM reviews ORDER BY created_at DESC LIMIT 1")->row_array();
     }
     function add_review($review)
     {
         $query = "INSERT INTO reviews (user_id, book_id, rating, review, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
         $values = array($review['user_id'], $review['book_id'], $review['rating'], $review['review']); 
         return $this->db->query($query, $values);
     }

     function all_users_books_reviews()
     {
        $query = "SELECT users.id AS user_id, users.alias, reviews.book_id AS book_id, books.title, reviews.id AS review_id, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at, '%M %D %Y') AS created_at FROM reviews LEFT JOIN users ON reviews.user_id = users.id RIGHT JOIN books ON reviews.book_id = books.id ORDER BY reviews.created_at DESC";

         return $this->db->query($query)->result_array(); 
     }

     // function user_total_reviews($user_id)
     // {
     //    $query = "SELECT users.id AS user_id, users.alias, reviews.book_id AS book_id, books.title, reviews.id AS review_id, reviews.review, reviews.rating, DATE_FORMAT(reviews.created_at, '%M %D %Y') AS created_at FROM reviews LEFT JOIN users ON reviews.user_id = users.id RIGHT JOIN books ON reviews.book_id = books.id ORDER BY reviews.created_at DESC";

     //     return $this->db->query($query)->result_array(); 
     // }
}
?>