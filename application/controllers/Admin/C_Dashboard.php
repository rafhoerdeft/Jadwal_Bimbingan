<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('encrypt');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
		$this->checkAuth();
	}

	public function index() {
		$data['antrianHariIni'] = $this->M_admin->jmlAntrianMasukHariIni();
		$data['totAntrian'] = $this->M_admin->totAntrian();

		$nav['nav'] = 1;
		
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/V_Index",$data);
		$this->load->view("V_Footer");
	}

	public function checkAuth(){
		if ($this->session->auth != 'adm_dosen'){
			redirect('Login');
		}
	}

	public function skipAntrian($id) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		
		$id_antrian	= $plaintext_string;
		
		if($this->M_admin->skipAntrian($id_antrian)) {
			redirect('Dashboard/index');
		} else {
			$this->session->set_flashdata('error', 'Jadwal berhasil didelete!');
			redirect('Dashboard/index/error');
		}	
	}

}
