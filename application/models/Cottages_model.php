<?php
class Cottages_model extends CI_Model{
	public function getAll(){
		$this->db->select("properties.*, locations.location_name");
		$this->db->from("properties");
		$this->db->join("locations",  "locations.__pk = properties._fk_location");
		return $this->db->get()->result_array();
	}

	public function searchFilter($searchData){
		$dateFrom = $this->_fixDate($searchData["from_date"]);
		$dateTo = $this->_fixDate($searchData["to_date"]);
		$this->db->select("properties.*, locations.location_name, bookings.start_date, bookings.end_date");
		$this->db->from("properties");
		$this->db->join("locations",  "locations.__pk = properties._fk_location");
		$this->db->join("bookings",  "bookings._fk_property = properties.__pk");
		$this->db->like('property_name', $searchData['location']);
		if($searchData["near_beach"]) $this->db->where('near_beach', 1);
		if($searchData["accepts_pets"]) $this->db->where('accepet_pets', 1);
		$this->db->where('sleeps >=', $searchData["sleeps"]);
		$this->db->where('beds >=', $searchData["beds"]);
		$this->db->where('beds >=', $searchData["beds"]);
		$this->db->where("start_date <", $dateFrom);
		$this->db->or_where("start_date >", $dateTo);
		$this->db->where("end_date <", $dateFrom);
		$this->db->or_where("end_date >", $dateTo);
		return $this->db->get()->result_array();
	}

	private function _fixDate($date){
		$dateExploded = explode("/", $date);
		return implode("-", array_reverse($dateExploded));
	}

}