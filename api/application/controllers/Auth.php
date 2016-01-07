<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Auth extends REST_Controller {

	public function __construct()
	{
		parent::__construct();

		// Load models
        $this->load->model('login_m', 'login');
	}

    public function login_post()
	{
		$post = $this->post();

        $email = $post['email'];
        $wachtwoord = $post['password'];
        //$wachtwoord = sha1($input->password);

		$where = array(
			'email' => $email,
			'wachtwoord' => $wachtwoord
		);

		$result = $this->login->get_by($where);

        if(isset($result->zv_id)) {

			$token = $email . " | " . uniqid() . uniqid() . uniqid();

            $data = array(
                'token' => $token
            );

			if($this->login->update($result->zv_id, $data)) {
				$this->response(array('status' => 'success', 'data' => $token));
			}
			else {
				$this->response(array('status' => 'failure', 'message' => 'Kon token niet zetten'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}
        }
        else {
            $this->response(array('status' => 'failure', 'message' => 'Login combinatie onjuist'), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
	}

    public function logout_post()
    {
        $post = $this->post();
        $token = $post['token'];

        $data = array(
            'token' => 'LOGGED OUT'
        );

		$where = array(
			'token' => $token
		);

		if(!$this->login->update_by($where, $data)) {
			$this->response(array('status' => 'failure', 'message' => 'Kon token niet resetten'));
		};
    }

	public function check_token_post()
	{
		$post = $this->post();
        $token = $post['token'];

		$where = array(
			'token' => $token
		);

		$result = $this->login->get_by($where);

		if(isset($result->zv_id)) {
			$this->response(array('status' => 'success', 'message' => 'authorized', 'data' => $result->zv_id));
		}
		else {
			$this->response(array('status' => 'failure', 'message' => 'unauthorized'));
		}
	}

}
