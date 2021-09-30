<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_login');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function index() {
		$this->session->sess_destroy();
		$this->load->view("V_Login");
	}

	public function authlogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		if($hasil = $this->M_login->checkUser($username)) {
			if($data = $this->M_login->checkPassword($username,$password)) {
				$akses = $this->M_login->checkAccountType($username,$password);
				if ($akses == "Admin" || $akses == "User" || $akses == "Pegawai") {
					$data[0]['auth'] = 'adm_dosen';
					$this->session->set_userdata($data[0]);
					redirect('DashboardAdmin');
					// var_dump($data[0]);
				} else {
					$this->session->set_flashdata('error','Akun ini tidak memiliki izin akses.');
					redirect('Login');
				}
			} else {
				$this->session->set_flashdata('error','Maaf, kata sandi anda salah!');
				redirect('Login');
			}
		} else {
			$this->session->set_flashdata('error','Maaf, akun ini belum terdaftar!');
			redirect('Login');	
		}
	}
}