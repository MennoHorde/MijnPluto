<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Diensten extends REST_Controller {

	function __construct() {
		parent::__construct();

		// load model
		$this->load->model('dienst_m', 'dienst');
	}

	function index_get($zv_id, $year, $week)
	{
		// Load helper
		$this->load->helper('mijnpluto');

		// Get week start and end date
		$week = start_end_week($year, $week);

		// Where array
		$where = array(
			'zv_id' => $zv_id,
			'datum >=' => $week['start'],
			'datum <=' => $week['end']
		);

		// Query database
		$diensten = $this->dienst->get_many_by($where);

		// Handle response
		if(!empty($diensten)) {
			$this->response(array('status' => 'success', 'data' => $diensten));
		}
		else {
			$this->response(array('status' => 'failure', 'message' => 'Couldn\'t get any diensten'), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function edit_get($id)
	{
		// Query database
		$dienst = $this->dienst->get($id);

		// Handle response
		if(!empty($dienst)) {
			$this->response(array('status' => 'success', 'data' => $dienst));
		}
		else {
			$this->response(array('status' => 'failure', 'message' => 'Couldn\'t get the speciefied dienst'), REST_Controller::HTTP_NOT_FOUND);
		}
	}

	function save_post($id = null)
	{
		$dienst = $this->post();

		if(isset($id)) {
			$this->dienst->validate = 'dienst_update';
			$dienst_id = $this->dienst->update($id, $dienst);
		}
		else {
			$this->dienst->validate = 'dienst_insert';
			$dienst_id = $this->dienst->insert($dienst);
		}

		if(!$dienst_id) {
			$this->response(array('status' => 'failure', 'message' => $this->form_validation->get_errors_as_array()), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
		}
		else {
			$this->response(array('status' => 'success', 'message' => 'success', 'data' => $this->post()));
		}
	}
}
