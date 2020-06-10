<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_tahunan extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();      
        check_not_login();
    }

    public function idstasiun_data()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $year = $this->input->post('tahun');
            $parameter = $this->input->post('parameter');
        }else{
            $id = $this->input->post('idstasiun');
            $year = $this->input->post('tahun');
            $parameter = $this->input->post('parameter');
        }

        $data['idstasiun']      = $this->b_tahunan_m->get_stasiun();
        $data['idstasiunloop']  = $this->b_tahunan_m->get_stasiun();
        $data['aqmdata']        = $this->b_tahunan_m->get_aqmdata();
        $data['aqmdatayear']    = $this->b_tahunan_m->get_aqmdata_year($id,$year,$parameter);

        $data['controllers']    = "dashboard";

        if(empty(!$data['aqmdatayear'])){
            foreach($data['aqmdatayear'] as $aqmdatayear){
                $nilai[$aqmdatayear["waktu"]] = $aqmdatayear[$parameter];
                $mm = date('m', strtotime($aqmdatayear["waktu"])); 
                $dd = date('d', strtotime($aqmdatayear["waktu"])); 
                @$total[$mm][$dd] += $aqmdatayear[$parameter];
                if(empty($min[$mm][$dd])) $min[$mm][$dd] = 9999999;
                if($aqmdatayear[$parameter] < $min[$mm][$dd])
                    $min[$mm][$dd] = $aqmdatayear[$parameter];
                if(empty($max[$mm][$dd])) $max[$mm][$dd] = 0;
                if($aqmdatayear[$parameter] > $max[$mm][$dd])
                    $max[$mm][$dd] = $aqmdatayear[$parameter];
                if(empty($extdata[$mm][$dd])) $extdata[$mm][$dd] = 0;
                if($aqmdatayear[$parameter]) $extdata[$mm][$dd]++;
            }
        } else {
            $nilai = '';
            $total = '';
            $min = '';
            $max = '';
            $extdata = '';
        }

        if(!empty($year)) {
            $tahun = $year;
        } else {
            $tahun = '2020';
        }

        $data['bulan'][1] = cal_days_in_month(CAL_GREGORIAN, 1, $tahun);
        $data['bulan'][2] = cal_days_in_month(CAL_GREGORIAN, 2, $tahun);
        $data['bulan'][3] = cal_days_in_month(CAL_GREGORIAN, 3, $tahun);
        $data['bulan'][4] = cal_days_in_month(CAL_GREGORIAN, 4, $tahun);
        $data['bulan'][5] = cal_days_in_month(CAL_GREGORIAN, 5, $tahun);
        $data['bulan'][6] = cal_days_in_month(CAL_GREGORIAN, 6, $tahun);
        $data['bulan'][7] = cal_days_in_month(CAL_GREGORIAN, 7, $tahun);
        $data['bulan'][8] = cal_days_in_month(CAL_GREGORIAN, 8, $tahun);
        $data['bulan'][9] = cal_days_in_month(CAL_GREGORIAN, 9, $tahun);
        $data['bulan'][10] = cal_days_in_month(CAL_GREGORIAN, 10, $tahun);
        $data['bulan'][11] = cal_days_in_month(CAL_GREGORIAN, 11, $tahun);
        $data['bulan'][12] = cal_days_in_month(CAL_GREGORIAN, 12, $tahun);

        $data['params'] = $parameter;
        $data["nilai"] = $nilai;
        $data["min"] = $min;
        $data["total"] = $total;
        $data["max"] = $max;
        $data["extdata"] = $extdata;

        $data["jam"][] = "00:00:00";
        $data["jam"][] = "00:30:00";
        $data["jam"][] = "01:00:00";
        $data["jam"][] = "01:30:00";
        $data["jam"][] = "02:00:00";
        $data["jam"][] = "02:30:00";
        $data["jam"][] = "03:00:00";
        $data["jam"][] = "03:30:00";
        $data["jam"][] = "04:00:00";
        $data["jam"][] = "04:30:00";
        $data["jam"][] = "05:00:00";
        $data["jam"][] = "05:30:00";
        $data["jam"][] = "06:00:00";
        $data["jam"][] = "06:30:00";
        $data["jam"][] = "07:00:00";
        $data["jam"][] = "07:30:00";
        $data["jam"][] = "08:00:00";
        $data["jam"][] = "08:30:00";
        $data["jam"][] = "09:00:00";
        $data["jam"][] = "09:30:00";
        $data["jam"][] = "10:00:00";
        $data["jam"][] = "10:30:00";
        $data["jam"][] = "11:00:00";
        $data["jam"][] = "11:30:00";
        $data["jam"][] = "12:00:00";
        $data["jam"][] = "12:30:00";
        $data["jam"][] = "13:00:00";
        $data["jam"][] = "13:30:00";
        $data["jam"][] = "14:00:00";
        $data["jam"][] = "14:30:00";
        $data["jam"][] = "15:00:00";
        $data["jam"][] = "15:30:00";
        $data["jam"][] = "16:00:00";
        $data["jam"][] = "16:30:00";
        $data["jam"][] = "17:00:00";
        $data["jam"][] = "17:30:00";
        $data["jam"][] = "18:00:00";
        $data["jam"][] = "18:30:00";
        $data["jam"][] = "19:00:00";
        $data["jam"][] = "19:30:00";
        $data["jam"][] = "20:00:00";
        $data["jam"][] = "20:30:00";
        $data["jam"][] = "21:00:00";
        $data["jam"][] = "21:30:00";
        $data["jam"][] = "22:00:00";
        $data["jam"][] = "22:30:00";
        $data["jam"][] = "23:00:00";
        $data["jam"][] = "23:30:00";

        if(empty($data['aqmdatayear'])) {
            $data['title_header']   = "Laporan Data Tahunan";
        }else{
            foreach($data['aqmdatayear'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan Data Tahunan Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/tahun/data/tahun', $data);
    }

    public function idstasiun_ispu()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $year = $this->input->post('tahun');
        }else{
            $id = $this->input->post('idstasiun');
            $year = $this->input->post('tahun');
        }

        $data['idstasiun']      = $this->b_tahunan_m->get_stasiun();
        $data['idstasiunloop']  = $this->b_tahunan_m->get_stasiun();
        $data['aqmdata']        = $this->b_tahunan_m->get_aqmdata();
        $data['maxispu']        = $this->b_tahunan_m->get_max_aqmispu_year($id,$year);
        $data['controllers']    = "dashboard";

        if(empty($data['maxispu'])) {
            $data['title_header']   = "Laporan ISPU Tahunan";
        }else{
            foreach($data['maxispu'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan ISPU Tahunan Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/tahun/ispu/tahun', $data);
    }
}