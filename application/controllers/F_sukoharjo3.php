<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_sukoharjo3 extends CI_Controller {

	public function index()
	{
		$data['aqmdatarum']  			= $this->f_sukoharjo_m->get_aqmdata_rum();
		$data['aqmdatagupit']  			= $this->f_sukoharjo_m->get_aqmdata_gupit();
		$data['aqmdataplesan']  		= $this->f_sukoharjo_m->get_aqmdata_plesan();
		$data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();
		$data['aqmdatacelep']  			= $this->f_sukoharjo_m->get_aqmdata_celep();
		$data['aqmdatapengkol']  		= $this->f_sukoharjo_m->get_aqmdata_pengkol();
		$data['title_header']   		= "Sukoharjo";

		$this->temp_frontend2->load('frontend/theme/template_v2', 'frontend/kota/sukoharjo3/ptrum', $data);
	}

	function cemsrum(){
		$data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();

        $this->load->view('frontend/kota/sukoharjo3/cemsrum', $data);
	}
	
	function status(){
		$data['aqmdatarum']  			= $this->f_sukoharjo_m->get_aqmdata_rum();
		$data['aqmdatagupit']  			= $this->f_sukoharjo_m->get_aqmdata_gupit();
		$data['aqmdataplesan']  		= $this->f_sukoharjo_m->get_aqmdata_plesan();
		$data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();
		$data['aqmdatacelep']  			= $this->f_sukoharjo_m->get_aqmdata_celep();
		$data['aqmdatapengkol']  		= $this->f_sukoharjo_m->get_aqmdata_pengkol();

        $this->load->view('frontend/kota/sukoharjo3/status', $data);
    }
}