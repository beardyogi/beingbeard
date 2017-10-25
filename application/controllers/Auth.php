<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Auth extends MY_Controller {

	public function index()
	{
		$this->render('login', 'full_width');
	}

	public function login()
	{
		$identity = $this->input->post('username');
		$password = $this->input->post('password');
		$remember = ($this->input->post('remember')=='on');
		if ($this->ion_auth->login($identity, $password, $remember))
		{
			// login succeed
			$messages = $this->ion_auth->messages();
			//$this->mViewData['messages'] = $message;
			redirect('/trending');
		}
		else
		{
			// login failed
			$messages = $this->ion_auth->errors();
			//$this->mViewData['messages'] = $message;
			redirect('auth');

		}

	}

	public function logout()
	{
		// redirect them to the login page
		$this->ion_auth->logout();
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('home', 'refresh');
	}

}
