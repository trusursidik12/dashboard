<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_harian extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();      
        check_not_login();
    }

    public function idstasiun_data()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $day = $this->input->post('hari');
        }else{
            $id = $this->input->post('idstasiun');
            $day = $this->input->post('hari');
        }

        $data['idstasiun']      = $this->b_harian_m->get_stasiun();
        $data['idstasiunloop']  = $this->b_harian_m->get_stasiun();
        $data['aqmdata']        = $this->b_harian_m->get_aqmdata();
        $data['aqmdataday']     = $this->b_harian_m->get_aqmdata_day($id,$day);
        $data['controllers']    = "dashboard";

        $count                    = $this->b_harian_m->get_count_aqmdata_day($id,$day);
        $data['countpm10']        = $count['countpm10'];
        $data['countpm25']        = $count['countpm25'];
        $data['countso2']         = $count['countso2'];
        $data['countco']          = $count['countco'];
        $data['counto3']          = $count['counto3'];
        $data['countno2']         = $count['countno2'];
        $data['counthc']          = $count['counthc'];
        $data['countvoc']         = $count['countvoc'];
        $data['countnh3']         = $count['countnh3'];
        $data['countno']          = $count['countno'];
        $data['counth2s']         = $count['counth2s'];
        $data['countcs2']         = $count['countcs2'];

        $min                    = $this->b_harian_m->get_min_aqmdata_day($id,$day);
        $data['minpm10']        = $min['minpm10'];
        $data['minpm25']        = $min['minpm25'];
        $data['minso2']         = $min['minso2'];
        $data['minco']          = $min['minco'];
        $data['mino3']          = $min['mino3'];
        $data['minno2']         = $min['minno2'];
        $data['minhc']          = $min['minhc'];
        $data['minvoc']         = $min['minvoc'];
        $data['minnh3']         = $min['minnh3'];
        $data['minno']          = $min['minno'];
        $data['minh2s']         = $min['minh2s'];
        $data['mincs2']         = $min['mincs2'];

        $avg                    = $this->b_harian_m->get_avg_aqmdata_day($id,$day);
        $data['avgpm10']        = $avg['avgpm10'];
        $data['avgpm25']        = $avg['avgpm25'];
        $data['avgso2']         = $avg['avgso2'];
        $data['avgco']          = $avg['avgco'];
        $data['avgo3']          = $avg['avgo3'];
        $data['avgno2']         = $avg['avgno2'];
        $data['avghc']          = $avg['avghc'];
        $data['avgvoc']         = $avg['avgvoc'];
        $data['avgnh3']         = $avg['avgnh3'];
        $data['avgno']          = $avg['avgno'];
        $data['avgh2s']         = $avg['avgh2s'];
        $data['avgcs2']         = $avg['avgcs2'];

        $max                    = $this->b_harian_m->get_max_aqmdata_day($id,$day);
        $data['maxpm10']        = $max['maxpm10'];
        $data['maxpm25']        = $max['maxpm25'];
        $data['maxso2']         = $max['maxso2'];
        $data['maxco']          = $max['maxco'];
        $data['maxo3']          = $max['maxo3'];
        $data['maxno2']         = $max['maxno2'];
        $data['maxhc']          = $max['maxhc'];
        $data['maxvoc']         = $max['maxvoc'];
        $data['maxnh3']         = $max['maxnh3'];
        $data['maxno']          = $max['maxno'];
        $data['maxh2s']         = $max['maxh2s'];
        $data['maxcs2']         = $max['maxcs2'];

        $sum                    = $this->b_harian_m->get_sum_aqmdata_day($id,$day);
        $data['sumpm10']        = $sum['sumpm10'];
        $data['sumpm25']        = $sum['sumpm25'];
        $data['sumso2']         = $sum['sumso2'];
        $data['sumco']          = $sum['sumco'];
        $data['sumo3']          = $sum['sumo3'];
        $data['sumno2']         = $sum['sumno2'];
        $data['sumhc']          = $sum['sumhc'];
        $data['sumvoc']         = $sum['sumvoc'];
        $data['sumnh3']         = $sum['sumnh3'];
        $data['sumno']          = $sum['sumno'];
        $data['sumh2s']         = $sum['sumh2s'];
        $data['sumcs2']         = $sum['sumcs2'];

        if(empty($data['aqmdataday'])) {
            $data['title_header']   = "Laporan Data Harian";
        }else{
            foreach($data['aqmdataday'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan Data Harian Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('d-m-Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/hari/data/hari', $data);
    }

    public function idstasiun_ispu()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $day = $this->input->post('hari');
        }else{
            $id = $this->input->post('idstasiun');
            $day = $this->input->post('hari');
        }
        
        $data['idstasiun']      = $this->b_harian_m->get_stasiun();
        $data['idstasiunloop']  = $this->b_harian_m->get_stasiun();
        $data['aqmdata']        = $this->b_harian_m->get_aqmdata();
        $data['maxispu']        = $this->b_harian_m->get_max_aqmispu_day($id,$day);
        $data['controllers']    = "dashboard";

        if(empty($data['maxispu'])) {
            $data['title_header']   = "Laporan ISPU Harian";
        }else{
            foreach($data['maxispu'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan ISPU Harian Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('d-m-Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/hari/ispu/hari', $data);
    }
}