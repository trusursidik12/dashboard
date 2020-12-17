<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_aqmispu extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();      
        check_not_login();
    }

    public function idstasiun($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiunid($idstasiun);
        $data['aqmstasiunkiec'] = $this->b_aqms_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmispu']        = $this->b_aqms_m->get_aqmispu();
        $data['controllers']    = "dashboard";
        $data['title_header']   = "aqm ispu";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmispu/aqmispu', $data);
    }

    public function idstasiun_kiec($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiunid_kiec($idstasiun);
        $data['aqmstasiunkiec'] = $this->b_aqms_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmispu']        = $this->b_aqms_m->get_aqmispu();
        $data['controllers']    = "dashboard";
        $data['title_header']   = "aqm data";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmispu/aqmispu', $data);
    }

    public function idstasiun_monitoring($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiun_mtr($idstasiun);
        $data['idstasiunselect']= $this->b_aqms_m->get_stasiun_mtr();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmispu']        = $this->b_aqms_m->get_aqmispu();
        $data['controllers']    = "Monitoring";
        $data['title_header']   = "aqm ispu";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmispu/monitoring', $data);
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

        $list = $this->b_aqms_m->get_datatables_ispu($from,$to,$idstasiun);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqms) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $aqms->id_stasiun;
            $row[] = date('d-m-Y', strtotime($aqms->waktu));
            $row[] = $aqms->pm10;
            $row[] = $aqms->pm25;
            $row[] = $aqms->so2;
            $row[] = $aqms->co;
            $row[] = $aqms->o3;
            $row[] = $aqms->no2;
            $row[] = $aqms->hc;
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->b_aqms_m->count_all_ispu($idstasiun),
                    "recordsFiltered" => $this->b_aqms_m->count_filtered_ispu($from,$to,$idstasiun),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }
}