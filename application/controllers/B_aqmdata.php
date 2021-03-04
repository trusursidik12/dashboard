<?php
defined('BASEPATH') or exit('No direct script access allowed');

class B_aqmdata extends CI_Controller
{

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

        if (empty($data['idstasiun'])) {
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

        if (empty($data['idstasiun'])) {
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/aqmdata', $data);
    }

    public function idstasiun_monitoring($idstasiun = NULL)
    {

        $data['idstasiun']      = $this->b_aqms_m->get_stasiun_mtr($idstasiun);
        $data['idstasiunselect'] = $this->b_aqms_m->get_stasiun_mtr();
        $data['idstasiunloop']  = $this->b_aqms_m->get_stasiun();
        $data['aqmdata']        = $this->b_aqms_m->get_aqmdatas();
        $data['controllers']    = "Monitoring";
        $data['title_header']   = "aqm data";

        if (empty($data['idstasiun'])) {
            show_404();
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/aqmdata/monitoring', $data);
    }

    public function get_ajax()
    {

        $idstasiun = @$_GET['id_stasiun'];

        $from = $this->input->post('from');
        $to = $this->input->post('to');

        if ($from != '' && $to != '') {
            $from = date('Y-m-d', strtotime($from));
            $to = date('Y-m-d', strtotime($to));
        }

        $list = $this->b_aqms_m->get_datatables($from, $to, $idstasiun);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $aqms) {
            $no++;
            $row = array();
            $row[] = $no . ".";
            $row[] = $aqms->id_stasiun;
            if ($this->fungsi->user_login()->usr_id == 11) {
                $row[] = $aqms->tsp;
            }
            $row[] = date('d-m-Y H:i', strtotime($aqms->waktu));
            if ($aqms->id_stasiun == 'VALE_ENGGANO') {
                $row[] = $aqms->pm10;
                $row[] = $aqms->tsp;
                $row[] = $aqms->so2; //MIKROGRAM
                $row[] = round(($aqms->so2 / 1000 * 24.45) / 64.06, 3); //PPM
            } else {
                $row[] = $aqms->pm10;
                $row[] = $aqms->pm25;
                if ($this->fungsi->user_login()->usr_id != 11) {
                    $row[] = $aqms->tsp;
                }
                $row[] = $aqms->so2;
                $row[] = $aqms->co;
                $row[] = $aqms->o3;
                $row[] = $aqms->no2;
                $row[] = $aqms->hc;
                $row[] = $aqms->voc;
                $row[] = $aqms->nh3;
                $row[] = $aqms->no;
                if ($aqms->id_stasiun == 'CEMS_RUM') {
                    $row[] = $aqms->h2s;
                    $row[] = $aqms->cs2;
                } else {
                    if ($aqms->id_stasiun == 'SKH_RUM' || $aqms->id_stasiun == 'SKH_GUPIT' || $aqms->id_stasiun == 'SKH_PLESAN' || $aqms->id_stasiun == 'SKH_CELEP' || $aqms->id_stasiun == 'SKH_PENGKOL') {
                        $row[] = $aqms->h2s;
                        $row[] = $aqms->cs2;
                    }
                }
                $row[] = $aqms->ws;
                $row[] = $aqms->wd;
                $row[] = $aqms->humidity;
                $row[] = $aqms->temperature;
                $row[] = $aqms->pressure;
                $row[] = $aqms->sr;
                $row[] = $aqms->rain_intensity;
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->b_aqms_m->count_all($idstasiun),
            "recordsFiltered" => $this->b_aqms_m->count_filtered($from, $to, $idstasiun),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
}
