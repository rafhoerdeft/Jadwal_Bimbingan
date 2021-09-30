<?php
class C_Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
	}


	
    public function index()
	{
		$this->load->view('V_Register');
	}

	public function insertakun() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$akses = 'Admin';
		$data  = array(
			'username' => $username,
			'nip' => $nip,
			'password' => $password,
			'nama' => $nama,
			'akses' => $akses
		);
		// echo "<pre>";
		// print_r($data);
		// exit();
		if($this->M_admin->insertUser($data)) {
			$this->session->set_flashdata('success', 'User berhasil ditambahkan!');
			redirect('Login/index');
		} else {
			$this->session->set_flashdata('error', 'Terjadi error pada saat insert ke database');
			redirect('Register/index');
		}
	}

}