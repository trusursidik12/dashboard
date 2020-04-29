<?php

class Fungsi
{
	
	protected $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function user_login(){
		// $this->ci->load->model('users_m');
		$users_id = $this->ci->session->userdata('userid');
		$users_data = $this->ci->b_acc_users_m->get($users_id)->row();
		return $users_data;
	}

	public function count_aqmdata($idstasiun)
	{
		return $this->ci->b_aqms_m->get_data_count_by_stasiun($idstasiun)->num_rows();
	}
}