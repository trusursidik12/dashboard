<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_aqms_m extends CI_Model {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->db2 = $this->load->database('second', TRUE);
	}

	public function get_stasiun($id = FALSE){
		if($id === FALSE){
			$this->db2->order_by('id', 'DESC');
			$query = $this->db2->get('aqm_stasiun_demo');
			return $query->result_array();
		}
		$query = $this->db2->get_where('aqm_stasiun_demo', array('id_stasiun' => $id));
		return $query->row_array();
	}

  public function get_aqmdata(){
      $this->db2->select('*');
      $this->db2->from('aqm_data');
      $this->db2->where('id IN (select max(id) from aqm_data group by id_stasiun)');
      $query = $this->db2->get();
      return $query->result_array();
  }

  public function get_aqmispu(){
      $this->db2->select('*');
      $this->db2->from('aqm_ispu');
      $this->db2->where('id IN (select max(id) from aqm_ispu group by id_stasiun)');
      $query = $this->db2->get();
      return $query->result_array();
  }

  public function get_stasiunid($id)
    {
        $this->db2->select('*');
        $this->db2->from('aqm_stasiun_demo');
        $this->db2->join('aqm_data', 'aqm_stasiun_demo.id_stasiun = aqm_data.id_stasiun');
        $this->db2->where('aqm_stasiun_demo.id_stasiun', $id);
        $query = $this->db2->get();
        return $query->row_array();
    }

	// public function count_data_by_id_stasiun($idstasiun){
	// 	$sql 	= "SELECT COUNT(id) as count_id FROM aqm_data WHERE id_stasiun LIKE '%$idstasiun%'";
	// 	$result = $this->db2->query($sql);
	// 	return $result->row()->count_id;
	// }

	// start datatables
  //   var $column_order = array(null, 'id_stasiun', 'waktu'); //set column field database for datatable orderable
  //   var $column_search = array('id_stasiun', 'waktu'); //set column field database for datatable searchable
  //   var $order = array('id' => 'desc'); // default order
 
  //   private function _get_datatables_query() {
  //       $this->db2->distinct('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity');
		// $this->db2->group_by('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity'); 
  //       $this->db2->from('aqm_data');
  //       $i = 0;
  //       foreach ($this->column_search as $item) { // loop column
  //           if(@$_POST['search']['value']) { // if datatable send POST for search
  //               if($i===0) { // first loop
  //                   $this->db2->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
  //                   $this->db2->like($item, $_POST['search']['value']);
  //               } else {
  //                   $this->db2->or_like($item, $_POST['search']['value']);
  //               }
  //               if(count($this->column_search) - 1 == $i) //last loop
  //                   $this->db2->group_end(); //close bracket
  //           }
  //           $i++;
  //       }
         
  //       if(isset($_POST['order'])) { // here order processing
  //           $this->db2->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
  //       }  else if(isset($this->order)) {
  //           $order = $this->order;
  //           $this->db2->order_by(key($order), $order[key($order)]);
  //       }
  //   }
  //   function get_datatables($idstasiun) {
  //       $this->_get_datatables_query();
  //       if(@$_POST['length'] != -1)
  //       $this->db2->limit(@$_POST['length'], @$_POST['start']);
  //   	$this->db2->where('id_stasiun', $idstasiun);
  //       $query = $this->db2->get();
  //       return $query->result();
  //   }
  //   function count_filtered($idstasiun) {
  //       $this->_get_datatables_query();
  //   	$this->db2->where('id_stasiun', $idstasiun);
  //       $query = $this->db2->get();
  //       return $query->num_rows();
  //   }
  //   function count_all($idstasiun) {
  //   	$this->db2->where('id_stasiun', $idstasiun);
  //       $this->db2->from('aqm_data');
  //       return $this->db2->count_all_results();
  //   }
    // end datatables



    // start
    var $table = 'aqm_data'; // define table
    var $column_order = array(null, 'id_stasiun', 'waktu'); //set column field database for datatable orderable
    var $column_search = array('id_stasiun', 'waktu'); //set column field database for datatable searchable
    var $order = array('id' => 'desc'); // default order

    public function get_datatables($from, $to, $idstasiun)
    {
        $this->_get_datatables_query($from, $to, $idstasiun);
       
        if(@$_POST['length'] != -1)
            $this->db2->limit(@$_POST['length'], @$_POST['start']);
        
        $query = $this->db2->get();
        
        return $query->result();
    }

    public function count_filtered($from, $to, $idstasiun)
    {
        $this->_get_datatables_query($from, $to, $idstasiun);
       
        $query = $this->db2->get();
       
        return $query->num_rows();
    }

    public function count_all($idstasiun)
    {
        $this->db2->from($this->table);
        $this->db2->where('id_stasiun', $idstasiun);
        return $this->db2->count_all_results();
    }

    private function _get_datatables_query($from,$to,$idstasiun)
    {
        $this->db2
                // ->select('*')
                ->distinct('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity')
                ->group_by('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2, hc, voc, nh3, no, h2s, cs2, ws, wd, humidity, temperature, pressure, sr, rain_intensity')
                ->from($this->table)
                ->where('id_stasiun', $idstasiun);

        if($from!='' && $to!='' || $from!= NULL) // To process our custom input parameter
        {

            $this->db2->where('waktu BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        }

        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db2->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db2->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db2->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db2->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db2->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        }
        elseif (isset($this->order)) // default order processing
        {
            $order = $this->order;

            $this->db2->order_by(key($order), $order[key($order)]);

        }
    }
    // end

    // start
    var $table_ispu = 'aqm_ispu'; // define table
    var $column_order_ispu = array(null, 'id_stasiun', 'waktu'); //set column field database for datatable orderable
    var $column_search_ispu = array('id_stasiun', 'waktu'); //set column field database for datatable searchable
    var $order_ispu = array('id' => 'desc'); // default order

    public function get_datatables_ispu($from, $to, $idstasiun)
    {
        $this->_get_datatables_query_ispu($from, $to, $idstasiun);
       
        if(@$_POST['length'] != -1)
            $this->db2->limit(@$_POST['length'], @$_POST['start']);
        
        $query = $this->db2->get();
        
        return $query->result();
    }

    public function count_filtered_ispu($from, $to, $idstasiun)
    {
        $this->_get_datatables_query_ispu($from, $to, $idstasiun);
       
        $query = $this->db2->get();
       
        return $query->num_rows();
    }

    public function count_all_ispu($idstasiun)
    {
        $this->db2->from($this->table_ispu);
        $this->db2->where('id_stasiun', $idstasiun);
        return $this->db2->count_all_results();
    }

    private function _get_datatables_query_ispu($from,$to,$idstasiun)
    {
        $this->db2
                // ->select('*')
                ->distinct('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2')
                ->group_by('id_stasiun, waktu, pm10, pm25, so2, co, o3, no2')
                ->from($this->table_ispu)
                ->where('id_stasiun', $idstasiun);

        if($from!='' && $to!='' || $from!= NULL) // To process our custom input parameter
        {

            $this->db2->where('waktu BETWEEN "'. date('Y-m-d', strtotime($from)). '" and "'. date('Y-m-d', strtotime($to)).'"');
        }

        $i = 0;
        foreach ($this->column_search_ispu as $item) // loop column
        {
            if(@$_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db2->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db2->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db2->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search_ispu) - 1 == $i) //last loop
                    $this->db2->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db2->order_by($this->column_order_ispu[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        }
        elseif (isset($this->order_ispu)) // default order processing
        {
            $order = $this->order_ispu;

            $this->db2->order_by(key($order), $order[key($order)]);

        }
    }
    // end

}