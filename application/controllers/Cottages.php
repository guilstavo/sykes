<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cottages extends CI_Controller {

	public function index(){
		$this->load->database();
		$this->load->model("Cottages_model");
		$cottages = $this->Cottages_model->getAll();
		$data = array("cottages" => $cottages);
		$this->load->helper("url");
		$this->load->view('cottages', $data);
	}

	public function search(){
		$this->load->database();
		$this->load->model("Cottages_model");
		$cottages = $this->Cottages_model->getAll();
		$data = array("cottages" => $cottages);
		$this->load->helper("url");
		$this->load->view('cottages', $data);
	}
}
