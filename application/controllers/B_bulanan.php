<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_bulanan extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();      
        check_not_login();
    }

    public function idstasiun_data()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $month = $this->input->post('bulan');
            $parameter = $this->input->post('parameter');
        }else{
            $id = $this->input->post('idstasiun');
            $month = $this->input->post('bulan');
            $parameter = $this->input->post('parameter');
        }

        $data['idstasiun']      = $this->b_bulanan_m->get_stasiun();
        $data['idstasiunkiec']  = $this->b_bulanan_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_bulanan_m->get_stasiun();
        $data['aqmdata']        = $this->b_bulanan_m->get_aqmdata();
        $data['aqmdatamont']    = $this->b_bulanan_m->get_aqmdata_month($id,$month,$parameter);

        if(empty(!$data['aqmdatamont'])){
            foreach($data['aqmdatamont'] as $aqmdatamont){
                $nilai[$aqmdatamont["waktu"]] = $aqmdatamont[$parameter]; 
                @$total[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] += $aqmdatamont[$parameter];
                if(empty($min[date('Y-m-d', strtotime($aqmdatamont["waktu"]))])) $min[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] = 9999999;
                if($aqmdatamont[$parameter] < $min[date('Y-m-d', strtotime($aqmdatamont["waktu"]))])
                    $min[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] = $aqmdatamont[$parameter];
                if(empty($max[date('Y-m-d', strtotime($aqmdatamont["waktu"]))])) $max[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] = 0;
                if($aqmdatamont[$parameter] > $max[date('Y-m-d', strtotime($aqmdatamont["waktu"]))])
                    $max[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] = $aqmdatamont[$parameter];
                if(empty($extdata[date('Y-m-d', strtotime($aqmdatamont["waktu"]))])) $extdata[date('Y-m-d', strtotime($aqmdatamont["waktu"]))] = 0;
                if($aqmdatamont[$parameter]) $extdata[date('Y-m-d', strtotime($aqmdatamont["waktu"]))]++;
            }
        } else {
            $nilai = '';
            $total = '';
            $min = '';
            $max = '';
            $extdata = '';
        }

        $data['controllers']    = "dashboard";
        $data['title_header']   = "Laporan Data Bulanan";

        if(!empty($data['aqmdatamont'])) {
            foreach(array_slice($data['aqmdatamont'], 0, 1) as $t) {
              $date = $t['waktu'];
              $tanggal = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($date)), date('Y', strtotime($date)));
            }
        }else{
            $tanggal = date('d-m-Y');            
        }
        $data['tgl']   = $tanggal;

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

        if(empty($data['aqmdatamont'])) {
            $data['title_header']   = "Laporan Data Bulanan";
        }else{
            foreach($data['aqmdatamont'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan Data Bulanan Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('F-Y', strtotime($headertitle['waktu']));
                    }
                }
                foreach($data['idstasiunkiec'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan Data Harian Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('d-m-Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/bulan/data/bulan', $data);
    }

    public function idstasiun_ispu()
    {
        if($this->input->post('submit')){
            $id = $this->input->post('idstasiun');
            $month = $this->input->post('bulan');
        }else{
            $id = $this->input->post('idstasiun');
            $month = $this->input->post('bulan');
        }
        
        $data['idstasiun']      = $this->b_bulanan_m->get_stasiun();
        $data['idstasiunkiec']  = $this->b_bulanan_m->get_stasiun_kiec();
        $data['idstasiunloop']  = $this->b_bulanan_m->get_stasiun();
        $data['maxispu']        = $this->b_bulanan_m->get_max_aqmispu_month($id,$month);
        $data['controllers']    = "dashboard";

        if(empty($data['maxispu'])) {
            $data['title_header']   = "Laporan ISPU Bulanan";
        }else{
            foreach($data['maxispu'] as $headertitle){
                foreach($data['idstasiun'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan ISPU Bulanan Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('m-Y', strtotime($headertitle['waktu']));
                    }
                }
                foreach($data['idstasiunkiec'] as $stasiunname){
                    if($headertitle['id_stasiun'] == $stasiunname['id_stasiun']) {
                        $data['title_header']   = "Laporan ISPU Bulanan Stasiun ".$stasiunname['nama']." Kota ".$stasiunname['kota']." ".date('m-Y', strtotime($headertitle['waktu']));
                    }
                }
            }
        }

        $this->temp_backend->load('backend/theme/template_v', 'backend/laporan/bulan/ispu/bulan', $data);
    }
}