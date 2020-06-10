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
		$data['controllers'] 	= "dashboard";
		$data['aqmstasiun']		= $this->b_aqms_m->get_stasiun();
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
		$data['aqmdata']  		= $this->b_aqms_m->get_aqmdata();

		$this->temp_backend->load('backend/theme/template_v', 'backend/dashboard/dashboard', $data);
	}

	public function wellcome()
	{
		$data['title_header'] 	= "Wellcome";
		$data['controllers'] 	= "dashboard";
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();

		$this->temp_backend->load('backend/theme/template_v', 'backend/dashboard/wellcome', $data);
	}

	public function monitoring()
	{
		$data['title_header'] 	= "Dashboard";
		$data['controllers'] 	= "dashboard";
		$data['aqmstasiunmtr']	= $this->b_aqms_m->get_stasiun_mtr();
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
		$data['aqmdata']  		= $this->b_aqms_m->get_aqmdata();

		$this->temp_backend->load('backend/theme/template_v', 'backend/dashboard/monitoring', $data);
	}
}
