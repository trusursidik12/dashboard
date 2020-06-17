<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_cilegon_m extends CI_Model {

  public function get_aqmispu_pci(){
    $this->db->where('id_stasiun', 'CILEGON_PCI');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_ispu');
    return $query->result_array();
  }

  public function get_aqmispu_simpang(){
    $this->db->where('id_stasiun', 'SIMPANG_TIGA');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_ispu');
    return $query->result_array();
  }

  public function get_aqmispu_ciwandan(){
    $this->db->where('id_stasiun', 'CIWANDAN');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_ispu');
    return $query->result_array();
  }

  public function get_aqmispu_merak(){
    $this->db->where('id_stasiun', 'MERAK');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_ispu');
    return $query->result_array();
  }

  public function get_weather_pci(){
    $this->db->where('id_stasiun', 'CILEGON_PCI');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_weather_simpang(){
    $this->db->where('id_stasiun', 'SIMPANG_TIGA');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_weather_ciwandan(){
    $this->db->where('id_stasiun', 'CIWANDAN');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  public function get_weather_merak(){
    $this->db->where('id_stasiun', 'MERAK');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

  //KIEC
  public function get_aqmispu_kiec(){
    $this->db->where('id_stasiun', 'KIEC');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_ispu');
    return $query->result_array();
  }

  public function get_weather_kiec(){
    $this->db->where('id_stasiun', 'KIEC');
    $this->db->order_by('id', 'DESC');
    $this->db->limit('1');
    $query = $this->db->get('aqm_data');
    return $query->result_array();
  }

}