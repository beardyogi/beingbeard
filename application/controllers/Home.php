<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {

	public function index()
	{
		$this->mPageTitle = "Welocme to World's First Beard School";
		$this->render('home','home_page');
	}
}
