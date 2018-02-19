<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
		$this->mPageTitle = "Being Beard!";
		$this->render('home','home_page');
	}
}
