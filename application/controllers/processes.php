<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Processes extends CI_Controller {

	public function login()
	{
		$post = $this->input->post();
		// var_dump($post);
		// echo '<br>';
		$user = $this->user->get_user_by_email($post['email']);
		// var_dump($user);

		if(!empty($user))
		{
			if($this->encrypt->decode($user['password']) == $post['password'])
			{
				$this->session->set_userdata('user', $user);
				// var_dump($this->session->all_userdata());

				redirect('/mains/home');
				die('logged in');
			}
		}

		redirect('/');
		die('login fail');
	}

	public function logout()
	{

		$this->session->sess_destroy();
		redirect('/');
		die('logout');
	}

	public function register()
	{
		$post = $this->input->post();
		// var_dump($post);

		$this->form_validation->set_rules('name', "Name", "trim|required");
		$this->form_validation->set_rules('alias', "Alias", "trim|required");
		$this->form_validation->set_rules('email', "Email", "valid_email|required");
		$this->form_validation->set_rules('password', "Password", "min_length[5]|required");
		$this->form_validation->set_rules('confirm_password', "Confirm Password", "matches[password]|required");

		// die('register');
		if($this->form_validation->run() === FALSE)
		{
			//if validaiton fails
			$this->session->set_flashdata('name', form_error('name'));
			$this->session->set_flashdata('alias', form_error('alias'));
			$this->session->set_flashdata('email', form_error('email'));
			$this->session->set_flashdata('password', form_error('password'));
			$this->session->set_flashdata('confirm_password', form_error('confirm_password'));

			redirect('/');
		}
		else
		{
			$user['name'] = $post['name'];
			$user['alias'] = $post['alias'];
			$user['email'] = $post['email'];
			$user['password'] = $this->encrypt->encode($post['password']);

			$all_users = $this->user->get_all_users();
			// var_dump($all_users);

			// var_dump($user);
			$this->user->add_user($user);
			redirect('/');
			die('registered');
		}
	}

	public function add_book()
	{
		$post = $this->input->post();
		var_dump($post);

		$new_book['title'] = $post['title'];
		if($post['author'] != 'Choose an Author')
		{
			$new_book['author'] = $post['author'];
		}
		else
		{
			$new_book['author'] = $post['new_author'];
		}
		// var_dump($new_book);
		$this->book->add_book($new_book);

		$book = $this->book->get_most_recent_book();
		// var_dump($book);

		$book_rating = array(
				'user_id' => $this->session->userdata('user')['id'],
				'book_id' => $book['id'],
				'rating' => $post['rating'],
				'review' => $post['review']
			);
		// var_dump($book_rating);
		$this->review->add_review($book_rating);

		$this->session->set_userdata('book', $book);

		redirect('/mains/book_info');
		die('added book');
	}

	public function add_review($book_id)
	{
		$post = $this->input->post();
		// var_dump($post);

		$data = array(
			'user_id' => $this->session->userdata('user')['id'],
			'book_id' => $book_id,
			'rating' => $post['rating'],
			'review' => $post['review_box']
			);
		// var_dump($data);

		$this->review->add_review($data);
		redirect('/mains/book_info/'.$book_id);
		die('added_review');
	}

	public function delete_review($id)
	{
		echo $id;
		die('delete');

		$this->db->where('id', $id);
		$this->db->delete('reviews');

		redirect('/mains/home/'); 
	}
}

//end of main controller