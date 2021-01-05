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
        $data['aqmstasiunkiec'] = $this->b_aqms_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmdata']        = $this->b_aqms_m->get_aqmdatas();
        $data['controllers']    = "dashboard";
        $data['title_header']   = "aqm data";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/aqmdata', $data);
    }

    public function idstasiun_kiec($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiunid_kiec($idstasiun);
        $data['aqmstasiunkiec'] = $this->b_aqms_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmdata']        = $this->b_aqms_m->get_aqmdatas();
        $data['controllers']    = "dashboard";
        $data['title_header']   = "aqm data";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/aqmdata', $data);
    }

    public function idstasiun_monitoring($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiun_mtr($idstasiun);
        $data['idstasiunselect']= $this->b_aqms_m->get_stasiun_mtr();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmdata']        = $this->b_aqms_m->get_aqmdatas();
        $data['controllers']    = "Monitoring";
        $data['title_header']   = "aqm data";

        if(empty($data['idstasiun'])){
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/monitoring', $data);
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
            $row[] = $aqms->tsp;
            $row[] = $aqms->so2;
            $row[] = $aqms->co;
            $row[] = $aqms->o3;
            $row[] = $aqms->no2;
            $row[] = $aqms->hc;
            $row[] = $aqms->voc;
            $row[] = $aqms->nh3;
            $row[] = $aqms->no;
            if($aqms->id_stasiun == 'CEMS_RUM'){
                $row[] = $aqms->h2s;
                $row[] = $aqms->cs2;   
            }else{
                if($aqms->id_stasiun == 'SKH_RUM' || $aqms->id_stasiun == 'SKH_GUPIT' || $aqms->id_stasiun == 'SKH_PLESAN' || $aqms->id_stasiun == 'SKH_CELEP' || $aqms->id_stasiun == 'SKH_PENGKOL'){
                    $row[] = $aqms->h2s;
                    $row[] = $aqms->cs2;
                }
            }
            // start edit
            // if($aqms->pm10 != null){
            //     $row[] = $aqms->pm10;
            // }
            // if($aqms->pm25 != null && $aqms->pm25 != '-1'){
            //     $row[] = $aqms->pm25;
            // }
            // if($aqms->tsp != null && $aqms->tsp != '-1'){
            //     $row[] = $aqms->tsp;
            // }
            // if($aqms->so2 != null && $aqms->so2 != '-1'){
            //     $row[] = $aqms->so2;
            // }
            // if($aqms->co != null && $aqms->co != '-1'){
            //     $row[] = $aqms->co;
            // }
            // if($aqms->o3 != null && $aqms->o3 != '-1'){
            //     $row[] = $aqms->o3;
            // }
            // if($aqms->no2 != null && $aqms->o3 != '-1'){
            //     $row[] = $aqms->no2;
            // }
            // if($aqms->hc != null && $aqms->hc != '-1'){
            //     $row[] = $aqms->hc;
            // }
            // if($aqms->voc != null && $aqms->voc != '-1'){
            //     $row[] = $aqms->voc;
            // }
            // if($aqms->nh3 != null && $aqms->nh3 != '-1'){
            //     $row[] = $aqms->nh3;
            // }
            // if($aqms->no != null && $aqms->no != '-1'){
            //     $row[] = $aqms->no;
            // }
            // if($aqms->id_stasiun == 'CEMS_RUM'){
            //     $row[] = round($aqms->h2s * 1500);
            //     $row[] = round($aqms->cs2 * 3130);   
            // }else{
            //     if($aqms->id_stasiun == 'SKH_RUM' || $aqms->id_stasiun == 'SKH_GUPIT' || $aqms->id_stasiun == 'SKH_PLESAN'){
            //         $row[] = $aqms->h2s;
            //         $row[] = $aqms->cs2;
            //     }
            // }
            // end edit
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