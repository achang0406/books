<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->output->enable_profiler();
	// }

	public function index()
	{
		$this->load->view('login_registration');
	}

	public function home()
	{
		// var_dump($this->session->all_userdata());
		$user = $this->session->userdata('user');
		// echo '<br>';
		// var_dump($user);
		// die('home');
		$user['book_info'] = $this->review->all_users_books_reviews();
		$user['books_with_reviews'] = $this->book->all_books_with_reviews();
		// var_dump($user);
		$this->load->view('books_home', $user);
	}

	public function add_book()
	{
		$this->load->view('add_book');
	}

	public function book_info($id = -1)
	{
		if($id == -1)
		{
			$book = $this->session->userdata('book');
		}
		else 
		{
			$book = $this->book->get_book_by_id($id);
			// $this->sessioin->set_userdata('book_id', $id);
		}
		$book['reviews'] = $this->review->all_users_books_reviews();
		$this->session->set_userdata('reviews',$book['reviews']);
		// var_dump($book);
		$this->load->view('book_info', $book);
	}

	public function user_info($id)
	{
		$user = $this->user->get_user_by_id($id);
		$user['total_reviews'] = $this->user->user_total_reviews($id);
		$user['reviewed_books'] = $this->user->user_reviewed_books($id);
		// var_dump($user);



		$this->load->view('user_info', $user);
	}
}

//end of main controller