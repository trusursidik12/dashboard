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
        $data['title_header']   	= "DLH CIlegon";

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

    public function cilegonkiec()
	{
		$data['aqmispukiec']  		= $this->f_cilegon_m->get_aqmispu_kiec();
        $data['weatherkiec']  		= $this->f_cilegon_m->get_weather_kiec();
        $data['title_header']   	= "Kiec";

		$this->temp_frontend->load('frontend/theme/template_v', 'frontend/kota/cilegon/kiec/cilegonkiec', $data);
    }
    
    function kiec(){
        $data['aqmispukiec']  		= $this->f_cilegon_m->get_aqmispu_kiec();
		$data['weatherkiec']  		= $this->f_cilegon_m->get_weather_kiec();

        $this->load->view('frontend/kota/cilegon/kiec/kiec', $data);
    }
}