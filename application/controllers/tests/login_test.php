<?php
require_once(APPPATH.'/controllers/login.php');
class Login_Test extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('unit_test');
		$this->unit->use_strict(TRUE);
	}

	public function index(){

		// Call your test functions here

		$test_report = array('unit_report' => $this->unit->report());

		$this->load->view('login/login_test_report', $test_report);
	}

}