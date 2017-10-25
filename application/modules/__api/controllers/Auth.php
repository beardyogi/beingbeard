<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Demo Controller with Swagger annotations
 * Reference: https://github.com/zircote/swagger-php/
 */

/**
 * [IMPORTANT]
 * 	To allow API access without API Key ("X-API-KEY" from HTTP Header),
 * 	remember to add routes from /application/modules/api/config/rest.php like this:
 * 		$config['auth_override_class_method']['dummy']['*'] = 'none';
 */
class Auth extends API_Controller {

	/**
	 * @SWG\Post(
	 * 	path="/createuser",
	 * 	tags={"auth"},
	 * 	@SWG\Parameter(
	 * 		in="body",
	 * 		name="body",
	 * 		description="User info",
	 * 		required=true,
	 * 		@SWG\Schema(ref="#/definitions/AuthSignUp")
	 * 	),
	 * 	@SWG\Response(
	 * 		response="200",
	 * 		description="Successful operation"
	 * 	)
	 * )
	 */
	public function index_post()
	{
		$params = elements(array('email','first_name','last_name','group_id','password'), $this->post());
		//$create = $this->ion_auth->register($data);
	    //($create) ? $this->success($this->ion_auth->messages()) : $this->error($this->ion_auth->errors());

	}




}
