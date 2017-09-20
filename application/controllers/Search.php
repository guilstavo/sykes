<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index(){

		$options = array(
			'1'=> '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9',
			'10' => '10'
		);
		$data = array("options" => $options);

		$this->load->helper("url");
		$this->load->helper('form');
		$this->load->view('search', $data);
	}
}
