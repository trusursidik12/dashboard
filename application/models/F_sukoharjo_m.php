<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_sukoharjo_m extends CI_Model {

  public function get_aqmdata_rum(){
    $this->db->where('id_stasiun', 'SKH_RUM');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_aqmdata_gupit(){
    $this->db->where('id_stasiun', 'SKH_GUPIT');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_aqmdata_plesan(){
    $this->db->where('id_stasiun', 'SKH_PLESAN');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_aqmdata_cems_rum(){
    $this->db->where('id_stasiun', 'CEMS_RUM');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

}