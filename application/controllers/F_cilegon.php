<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_cilegon extends CI_Controller {

	public function index()
	{
		$data['aqmispupci']  		= $this->f_cilegon_m->get_aqmispu_pci();
		$data['weatherpci']  		= $this->f_cilegon_m->get_weather_pci();
		$data['aqmispusimpang']  	= $this->f_cilegon_m->get_aqmispu_simpang();
		$data['weathersimpang']  	= $this->f_cilegon_m->get_weather_simpang();
		$data['aqmispuciwandan']  	= $this->f_cilegon_m->get_aqmispu_ciwandan();
		$data['weatherciwandan']  	= $this->f_cilegon_m->get_weather_ciwandan();
		$data['aqmispumerak']  		= $this->f_cilegon_m->get_aqmispu_merak();
		$data['weathermerak']  	    = $this->f_cilegon_m->get_weather_merak();

		$this->temp_frontend->load('frontend/theme/template_v', 'frontend/kota/cilegon/cilegon', $data);
	}

	function pci(){
        $data['aqmispupci']  		= $this->f_cilegon_m->get_aqmispu_pci();
        $data['weatherpci']  		= $this->f_cilegon_m->get_weather_pci();

        $this->load->view('frontend/kota/cilegon/pci', $data);
    }

	function simpang(){
        $data['aqmispusimpang']  	= $this->f_cilegon_m->get_aqmispu_simpang();
        $data['weathersimpang']  	= $this->f_cilegon_m->get_weather_simpang();

        $this->load->view('frontend/kota/cilegon/simpang', $data);
    }

	function ciwandan(){
        $data['aqmispuciwandan']  	= $this->f_cilegon_m->get_aqmispu_ciwandan();
        $data['weatherciwandan']  	= $this->f_cilegon_m->get_weather_ciwandan();

        $this->load->view('frontend/kota/cilegon/ciwandan', $data);
    }

	function merak(){
        $data['aqmispumerak']  		= $this->f_cilegon_m->get_aqmispu_merak();
        $data['weathermerak']  	    = $this->f_cilegon_m->get_weather_merak();

        $this->load->view('frontend/kota/cilegon/merak', $data);
    }
}