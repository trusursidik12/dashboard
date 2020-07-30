<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_stations extends CI_Controller {

	function __construct()
	{
		parent::__construct();		
		check_not_login();
		check_bukan_level_staff();
	}

	public function index()
	{
		$data['stations'] 		= $this->b_stations_m->get_stations();
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
		$data['title_header'] 	= "Stations List";
		$data['title_menu'] 	= "Add Station";
		$data['controllers'] 	= "stations";
		$this->temp_backend->load('backend/theme/template_v', 'backend/station/station_list', $data);
	}

	public function add(){
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
		$data['cities']  		= $this->b_stations_m->get_cities();
		$data['title_header'] 	= "Add Station";
		$data['title_menu'] 	= "List Station";
		$data['controllers'] 	= "stations";

		$this->form_validation->set_rules('id_stasiun', 'ID Station', 'required|is_unique[aqm_stasiun_demo.id_stasiun]|max_length[50]');
		$this->form_validation->set_rules('nama', 'Station Name', 'required|max_length[50]');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');
		$this->form_validation->set_message('is_unique', '%s Already Exist, Please Input Another ID Station..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template_v', 'backend/station/station_form_add', $data);
		} else {
			$this->b_stations_m->add_station();
			redirect('stations/list');
		}		
	}

	public function edit($id = NULL){
		$id = decrypt_url($id);
		$data['stations'] 		= $this->b_stations_m->get_stations($id);
		$data['cities']  		= $this->b_stations_m->get_cities();
		$data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
		$data['title_header'] 	= "Edit Station";
		$data['title_menu'] 	= "List Station";
		$data['controllers'] 	= "stations";

		if(empty($data['stations'])){
			show_404();
		}

		$this->form_validation->set_rules('id_stasiun', 'ID Stasiun', 'required|callback_idstations_check|max_length[50]');
		$this->form_validation->set_rules('nama', 'Station Name', 'required|max_length[50]');

		$this->form_validation->set_message('required', '%s Empty, Please Input..');

		if($this->form_validation->run() === FALSE){
			$this->temp_backend->load('backend/theme/template_v', 'backend/station/station_form_edit', $data);
		} else {
			$this->b_stations_m->update_station();
			redirect('stations/list');
		}
	}

	public function idstations_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM aqm_stasiun_demo WHERE id_stasiun = '$post[id_stasiun]' AND id != '$post[id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('idstations_check', '{field} Already Exist, Please Input Another ID Station');
			return FALSE;
		}
			return TRUE;
	}
}
