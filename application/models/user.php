<?php
class user extends CI_Model {
     function get_all_users()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users")->result_array();
     }
     function get_user_by_email($user_email)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users WHERE email = ?", array($user_email))->row_array();
     }
     function get_user_by_id($user_id)
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users WHERE id = ?", array($user_id))->row_array();
     }
     function get_most_recent_user()
     {
         return $this->db->query("SELECT *, DATE_FORMAT(created_at, '%M %D %Y') AS 'created_on' FROM users ORDER BY id DESC LIMIT 1")->row_array();
     }
     function add_user($user)
     {
        // $this->load->helper('date');
         $query = "INSERT INTO users (name, alias, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
         $values = array($user['name'], $user['alias'], $user['email'], $user['password']); 
         return $this->db->query($query, $values);
     }
     function user_total_reviews($user_id)
     {
        return $this->db->query("SELECT COUNT(users.id) AS SUM, users.alias FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE users.id = ? GROUP BY users.id", array($user_id))->row_array();
     }
     function user_reviewed_books($user_id)
     {
        return $this->db->query("SELECT reviews.book_id AS book_id, books.title, COUNT(reviews.user_id) AS review_count FROM reviews RIGHT JOIN books ON reviews.book_id = books.id WHERE reviews.user_id = ? GROUP BY reviews.book_id", array($user_id))->result_array();
     }
}
?>