<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_tahunan_m extends CI_Model {

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

  public function get_aqmdata_year($idstasiun,$year,$parameter){
    $this->db->select('id_stasiun, waktu, '.$parameter.'');
    $this->db->distinct('id_stasiun, waktu, '.$parameter.'');
    $this->db->group_by('id_stasiun, waktu, '.$parameter.'');
    $this->db->from('aqm_data');
    $this->db->where('id_stasiun', $idstasiun);
    $this->db->where('waktu LIKE date_format(waktu, "%'.$year.'%")');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_max_aqmispu_year($idstasiun,$year){
    $sql = $this->db->query('select id_stasiun, waktu, pm10, so2, co, o3, no2, @highest_val:=greatest(pm10,so2,co,o3,no2) AS maxvalueparams, CASE @highest_val WHEN waktu THEN "WAKTU" WHEN pm10 THEN "PM10" WHEN so2 THEN "SO2" WHEN co THEN "CO" WHEN o3 THEN "O3" WHEN no2 THEN "NO2" END AS maxnameparams from aqm_ispu WHERE id_stasiun = "'.$idstasiun.'" AND waktu LIKE date_format(waktu, "%'.$year.'%")');
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