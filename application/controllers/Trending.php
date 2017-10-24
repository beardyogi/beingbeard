<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Trending extends MY_Controller {

	public function index()
	{
		$this->mPageTitle = "Beard Campaigns";
		$this->mViewData['tezt'] = "hello";
		$this->render('trending', 'full_width');
	}
}
