<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_sukoharjo extends CI_Controller {

	public function index()
	{
		$data['aqmdatarum']  			= $this->b_sukoharjo_m->get_aqmdata_rum();
		$data['aqmdatagupit']  			= $this->b_sukoharjo_m->get_aqmdata_gupit();
		$data['aqmdataplesan']  		= $this->b_sukoharjo_m->get_aqmdata_plesan();
		$data['aqmdatacemsrum']  		= $this->b_sukoharjo_m->get_aqmdata_cems_rum();

		$this->temp_frontend->load('frontend/theme/template_v', 'frontend/kota/sukoharjo/ptrum', $data);
	}

	function camsrum(){
		$data['aqmdatarum']  			= $this->b_sukoharjo_m->get_aqmdata_rum();

        $this->load->view('frontend/kota/sukoharjo/camsrum', $data);
    }

	function camsgupit(){
		$data['aqmdatagupit']  			= $this->b_sukoharjo_m->get_aqmdata_gupit();

        $this->load->view('frontend/kota/sukoharjo/camsgupit', $data);
    }

	function camsplesan(){
		$data['aqmdataplesan']  		= $this->b_sukoharjo_m->get_aqmdata_plesan();

        $this->load->view('frontend/kota/sukoharjo/camsplesan', $data);
    }

	function cemsrum(){
		$data['aqmdatacemsrum']  		= $this->b_sukoharjo_m->get_aqmdata_cems_rum();

        $this->load->view('frontend/kota/sukoharjo/cemsrum', $data);
    }
}