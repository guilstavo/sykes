<?php
class Cottages_model extends CI_Model{
	public function getAll(){
		$this->db->select("properties.*, locations.location_name");
		$this->db->from("properties");
		$this->db->join("locations",  "locations.__pk = properties._fk_location");
		return $this->db->get()->result_array();
	}
}