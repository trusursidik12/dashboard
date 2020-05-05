<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_aqmdata extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();      
        check_not_login();
    }

    public function idstasiun($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiunid($idstasiun);
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmdata']        = $this->b_aqms_m->get_aqmdata();
        $data['controllers']    = "dashboard";
        $data['title_header']   = "aqm data";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/aqmdata', $data);
    }

	public function get_ajax() {

        $idstasiun = @$_GET['id_stasiun'];
        
        $from = $this->input->post('from');
        $to = $this->input->post('to');

        if($from!='' && $to!='')
        {
            $from = date('Y-m-d',strtotime($from));
            $to = date('Y-m-d',strtotime($to));
        }

        $list = $this->b_aqms_m->get_datatables($from,$to,$idstasiun);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqms) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $aqms->id_stasiun;
            $row[] = date('d-m-Y H:i', strtotime($aqms->waktu));
            $row[] = $aqms->pm10;
            $row[] = $aqms->pm25;
            $row[] = $aqms->so2;
            $row[] = $aqms->co;
            $row[] = $aqms->o3;
            $row[] = $aqms->no2;
            $row[] = $aqms->hc;
            $row[] = $aqms->voc;
            $row[] = $aqms->nh3;
            $row[] = $aqms->no;
            $row[] = $aqms->h2s;
            $row[] = $aqms->cs2;
            $row[] = $aqms->ws;
            $row[] = $aqms->wd;
            $row[] = $aqms->humidity;
            $row[] = $aqms->temperature;
            $row[] = $aqms->pressure;
            $row[] = $aqms->sr;
            $row[] = $aqms->rain_intensity;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->b_aqms_m->count_all($idstasiun),
                    "recordsFiltered" => $this->b_aqms_m->count_filtered($from,$to,$idstasiun),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
}