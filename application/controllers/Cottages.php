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
		$this->form_validation->set_rules('from_date', 'From', 'required');
		$this->form_validation->set_rules('to_date', 'To', 'required');
		$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

		$success = $this->form_validation->run();
		if($success){
			$searchData = array(
				'location' => $this->input->post('location'),
				'near_beach' => $this->input->post('near_beach'),
				'accepts_pets' => $this->input->post('accepts_pets'),
				'sleeps' => $this->input->post('sleeps'),
				'beds' => $this->input->post('beds'),
				'from_date' => $this->input->post('from_date'),
				'to_date' => $this->input->post('to_date')
			);

			$this->load->database();
			$this->load->model("Cottages_model");
			$cottages = $this->Cottages_model->searchFilter($searchData);
			$data = array("cottages" => $cottages);
			$this->load->helper("url");
			$this->load->view('cottages', $data);
		}else{
			$this->load->helper("url");
			$this->load->helper('form');
			$this->load->view('search');
			// redirect('search/index');
		}
		
	}
}
