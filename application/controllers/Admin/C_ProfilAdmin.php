<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_ProfilAdmin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");
		$this->checkSession();
	}

	public function index() {
		
		$nav['nav'] = 0;
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/V_ProfilAdmin");
		$this->load->view("V_Footer");
	}

	public function checkSession(){
		if(!$this->session->id_user){
			redirect('Login');
		}
	}
}
