<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_stations_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function get_stations($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
			$this->db->join('acc_cities', 'acc_cities.cty_id = aqm_stasiun_demo.cty_id','left');
			$query = $this->db->get('aqm_stasiun_demo');
			return $query->result_array();
		}
		$query = $this->db->get_where('aqm_stasiun_demo', array('id' => $id));
		return $query->row_array();
	}

	public function get_cities(){
		$this->db->order_by('cty_id', 'DESC');
		$query = $this->db->get('acc_cities');
		return $query->result_array();
	}

	public function add_station(){
		$data = array(
			'id_stasiun' 				=> $this->input->post('id_stasiun'),
			'nama' 						=> $this->input->post('nama'),
			'lat' 						=> $this->input->post('lat'),
			'lon' 						=> $this->input->post('lon'),
			'alamat' 					=> $this->input->post('alamat'),
			'kota' 						=> $this->input->post('kota'),
			'provinsi' 					=> $this->input->post('provinsi'),
			'geojson' 					=> $this->input->post('geojson'),
			'cty_id' 					=> $this->input->post('cty_id')
		);
		return $this->db->insert('aqm_stasiun_demo', $data);
	}

	public function update_station(){		
		$data = array(
			'id_stasiun' 				=> $this->input->post('id_stasiun'),
			'nama' 						=> $this->input->post('nama'),
			'lat' 						=> $this->input->post('lat'),
			'lon' 						=> $this->input->post('lon'),
			'alamat' 					=> $this->input->post('alamat'),
			'kota' 						=> $this->input->post('kota'),
			'provinsi' 					=> $this->input->post('provinsi'),
			'geojson' 					=> $this->input->post('geojson'),
			'cty_id' 					=> $this->input->post('cty_id')
		);
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('aqm_stasiun_demo', $data);
	}

}