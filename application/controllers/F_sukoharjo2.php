<?php
defined('BASEPATH') or exit('No direct script access allowed');

class F_sukoharjo2 extends CI_Controller
{

	public function index()
	{
		// $data['aqmdatarum']  			= $this->f_sukoharjo_m->get_aqmdata_rum();
		// $data['aqmdatagupit']  			= $this->f_sukoharjo_m->get_aqmdata_gupit();
		// $data['aqmdataplesan']  		= $this->f_sukoharjo_m->get_aqmdata_plesan();
		// $data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();
		// $data['aqmdatacelep']  			= $this->f_sukoharjo_m->get_aqmdata_celep();
		// $data['aqmdatapengkol']  		= $this->f_sukoharjo_m->get_aqmdata_pengkol();
		$data['title_header']   		= "Sukoharjo";

		$this->temp_frontend2->load('frontend/theme/template_v2', 'frontend/kota/sukoharjo2/ptrum', $data);
	}

	// function camsrum(){
	// 	$data['aqmdatarum']  			= $this->f_sukoharjo_m->get_aqmdata_rum();

	//     $this->load->view('frontend/kota/sukoharjo2/camsrum', $data);
	// }

	// function camsgupit(){
	// 	$data['aqmdatagupit']  			= $this->f_sukoharjo_m->get_aqmdata_gupit();

	//     $this->load->view('frontend/kota/sukoharjo2/camsgupit', $data);
	// }

	// function camsplesan(){
	// 	$data['aqmdataplesan']  		= $this->f_sukoharjo_m->get_aqmdata_plesan();

	//     $this->load->view('frontend/kota/sukoharjo2/camsplesan', $data);
	// }

	// function cemsrum(){
	// 	$data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();

	//     $this->load->view('frontend/kota/sukoharjo2/cemsrum', $data);
	// }

	// function camscelep(){
	// 	$data['aqmdatacelep']  		= $this->f_sukoharjo_m->get_aqmdata_celep();

	//     $this->load->view('frontend/kota/sukoharjo2/camscelep', $data);
	// }

	// function camspengkol(){
	// 	$data['aqmdatapengkol']  		= $this->f_sukoharjo_m->get_aqmdata_pengkol();

	//     $this->load->view('frontend/kota/sukoharjo2/camspengkol', $data);
	// }

	// function status(){
	// 	$data['aqmdatarum']  			= $this->f_sukoharjo_m->get_aqmdata_rum();
	// 	$data['aqmdatagupit']  			= $this->f_sukoharjo_m->get_aqmdata_gupit();
	// 	$data['aqmdataplesan']  		= $this->f_sukoharjo_m->get_aqmdata_plesan();
	// 	$data['aqmdatacemsrum']  		= $this->f_sukoharjo_m->get_aqmdata_cems_rum();
	// 	$data['aqmdatacelep']  			= $this->f_sukoharjo_m->get_aqmdata_celep();
	// 	$data['aqmdatapengkol']  		= $this->f_sukoharjo_m->get_aqmdata_pengkol();

	//     $this->load->view('frontend/kota/sukoharjo2/status', $data);
	// }
}
