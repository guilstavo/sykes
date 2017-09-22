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
		$this->load->helper("url");
		if(!$this->session->flashdata('cottages')){
			$this->form_validation->set_rules('from_date', 'From', 'required');
			$this->form_validation->set_rules('to_date', 'To', 'required');
			$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

			$success = $this->form_validation->run();
		}else{
			$success = true;
		}
		if($success){
			if(!$this->session->flashdata('cottages')){
				$this->load->helper('cookie');
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
			}else{
				$cottages = $this->session->flashdata('cottages');
			}
			$this->session->set_flashdata('cottages', $cottages);
			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/cottages/search';
			$config['total_rows'] = count($cottages);
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) -1) * $config['per_page'] : 0;
			$config['use_page_numbers'] = TRUE;

			$data["cottages"] = array_slice($cottages, $page, $config["per_page"]);
			$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();

			$this->load->view('cottages', $data);
		}else{
			$this->load->helper('form');
			$this->load->view('search');
		}
		
	}
}
