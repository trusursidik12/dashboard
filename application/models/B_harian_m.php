<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_harian_m extends CI_Model {

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function get_stasiun($id = FALSE){
      $ctyid = $this->fungsi->user_login()->usr_cty_id;
      $this->db->order_by('id', 'DESC');
      $this->db->where('cty_id', $ctyid);
      $query = $this->db->get('aqm_stasiun_demo');
      return $query->result_array();
    }

  public function get_aqmdata(){
      $this->db->select('*');
      $this->db->from('aqm_data');
      $this->db->where('id IN (select max(id) from aqm_data group by id_stasiun)');
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_aqmdata_day($idstasiun,$day){
    $this->db->distinct('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2');
    $this->db->group_by('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2');
    $this->db->from('aqm_data');
    $this->db->where('id_stasiun', $idstasiun);
    $this->db->where('waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_count_aqmdata_day($idstasiun,$day){
    $sql = $this->db->query('select count(pm10) AS countpm10, count(pm25) AS countpm25, count(so2) AS countso2, count(co) AS countco, count(o3) AS counto3, count(no2) AS countno2, count(hc) AS counthc, count(voc) AS countvoc, count(nh3) AS countnh3, count(no) AS countno, count(h2s) AS counth2s, count(cs2) AS countcs2 from aqm_data WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $sql->row();
    return array(
      'countpm10' => $query->countpm10,
      'countpm25' => $query->countpm25,
      'countso2' => $query->countso2,
      'countco' => $query->countco,
      'counto3' => $query->counto3,
      'countno2' => $query->countno2,
      'counthc' => $query->counthc,
      'countvoc' => $query->countvoc,
      'countnh3' => $query->countnh3,
      'countno' => $query->countno,
      'counth2s' => $query->counth2s,
      'countcs2' => $query->countcs2,
    );
  }

  public function get_min_aqmdata_day($idstasiun,$day){
    $sql = $this->db->query('select min(pm10) AS minpm10, min(pm25) AS minpm25, min(so2) AS minso2, min(co) AS minco, min(o3) AS mino3, min(no2) AS minno2, min(hc) AS minhc, min(voc) AS minvoc, min(nh3) AS minnh3, min(no) AS minno, min(h2s) AS minh2s, min(cs2) AS mincs2 from aqm_data WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $sql->row();
    return array(
      'minpm10' => $query->minpm10,
      'minpm25' => $query->minpm25,
      'minso2' => $query->minso2,
      'minco' => $query->minco,
      'mino3' => $query->mino3,
      'minno2' => $query->minno2,
      'minhc' => $query->minhc,
      'minvoc' => $query->minvoc,
      'minnh3' => $query->minnh3,
      'minno' => $query->minno,
      'minh2s' => $query->minh2s,
      'mincs2' => $query->mincs2,
    );
  }

  public function get_avg_aqmdata_day($idstasiun,$day){
    $sql = $this->db->query('select avg(pm10) AS avgpm10, avg(pm25) AS avgpm25, avg(so2) AS avgso2, avg(co) AS avgco, avg(o3) AS avgo3, avg(no2) AS avgno2, avg(hc) AS avghc, avg(voc) AS avgvoc, avg(nh3) AS avgnh3, avg(no) AS avgno, avg(h2s) AS avgh2s, avg(cs2) AS avgcs2 from aqm_data WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $sql->row();
    return array(
      'avgpm10' => $query->avgpm10,
      'avgpm25' => $query->avgpm25,
      'avgso2' => $query->avgso2,
      'avgco' => $query->avgco,
      'avgo3' => $query->avgo3,
      'avgno2' => $query->avgno2,
      'avghc' => $query->avghc,
      'avgvoc' => $query->avgvoc,
      'avgnh3' => $query->avgnh3,
      'avgno' => $query->avgno,
      'avgh2s' => $query->avgh2s,
      'avgcs2' => $query->avgcs2,
    );
  }

  public function get_max_aqmdata_day($idstasiun,$day){
    $sql = $this->db->query('select max(pm10) AS maxpm10, max(pm25) AS maxpm25, max(so2) AS maxso2, max(co) AS maxco, max(o3) AS maxo3, max(no2) AS maxno2, max(hc) AS maxhc, max(voc) AS maxvoc, max(nh3) AS maxnh3, max(no) AS maxno, max(h2s) AS maxh2s, max(cs2) AS maxcs2 from aqm_data WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $sql->row();
    return array(
      'maxpm10' => $query->maxpm10,
      'maxpm25' => $query->maxpm25,
      'maxso2' => $query->maxso2,
      'maxco' => $query->maxco,
      'maxo3' => $query->maxo3,
      'maxno2' => $query->maxno2,
      'maxhc' => $query->maxhc,
      'maxvoc' => $query->maxvoc,
      'maxnh3' => $query->maxnh3,
      'maxno' => $query->maxno,
      'maxh2s' => $query->maxh2s,
      'maxcs2' => $query->maxcs2,
    );
  }

  public function get_sum_aqmdata_day($idstasiun,$day){
    $sql = $this->db->query('select sum(pm10) AS sumpm10, sum(pm25) AS sumpm25, sum(so2) AS sumso2, sum(co) AS sumco, sum(o3) AS sumo3, sum(no2) AS sumno2, sum(hc) AS sumhc, sum(voc) AS sumvoc, sum(nh3) AS sumnh3, sum(no) AS sumno, sum(h2s) AS sumh2s, sum(cs2) AS sumcs2 from aqm_data WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    $query = $sql->row();
    return array(
      'sumpm10' => $query->sumpm10,
      'sumpm25' => $query->sumpm25,
      'sumso2' => $query->sumso2,
      'sumco' => $query->sumco,
      'sumo3' => $query->sumo3,
      'sumno2' => $query->sumno2,
      'sumhc' => $query->sumhc,
      'sumvoc' => $query->sumvoc,
      'sumnh3' => $query->sumnh3,
      'sumno' => $query->sumno,
      'sumh2s' => $query->sumh2s,
      'sumcs2' => $query->sumcs2,
    );
  }

  public function get_max_aqmispu_day($idstasiun,$day){
    $sql = $this->db->query('select id_stasiun, waktu, pm10, so2, co, o3, no2, @highest_val:=greatest(pm10,so2,co,o3,no2) AS maxvalueparams, CASE @highest_val WHEN waktu THEN "WAKTU" WHEN pm10 THEN "PM10" WHEN so2 THEN "SO2" WHEN co THEN "CO" WHEN o3 THEN "O3" WHEN no2 THEN "NO2" END AS maxnameparams from aqm_ispu WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$day.'%")');
    return $sql->result_array();
  }

  public function get_aqmispu(){
      $this->db->select('*');
      $this->db->from('aqm_ispu');
      $this->db->where('id IN (select max(id) from aqm_ispu group by id_stasiun)');
      $query = $this->db->get();
      return $query->result_array();
  }

}