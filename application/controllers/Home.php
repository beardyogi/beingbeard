<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{   
        // $login_status = $this->session->userdata['logged_in'];
        // if($login_status == 'true'){
        //     $this->mPageTitle = "Being Beard!";
		//     $this->render('home','home_page');
        // }else{
        //     redirect('auth');
        // }
		    $this->mPageTitle = "Being Beard! Welcome to world's first Beard School.";
		    $this->render('home','home_page');
	}
}
