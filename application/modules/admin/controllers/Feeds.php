<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feeds extends Admin_Controller {

	public function index()
	{
		$crud = $this->generate_crud('feeds_source');
        $crud->columns('id','campaign_name','bg_color','status','added_on');
        $this->mPageTitle = 'Feeds';
		$this->render_crud();
    }

}
