<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
	}

	public function index()
	{
		$data['title_header'] 	= "Dashboard";
		$data['controllers'] 	= "levels";
		$data['aqmstasiun']		= $this->b_aqms_m->get_stasiun();

		$this->temp_backend->load('backend/theme/template_v', 'backend/dashboard/dashboard', $data);
	}
}
