<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Jadwal extends CI_Controller {

/* ----------------------- VIEW LOAD ----------------------------*/
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('encrypt');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
		$this->checkAuth();
	}

	public function checkAuth(){
		if ($this->session->auth != 'adm_dosen'){
			redirect('Login');
		}
	}

	public function index($status=false) {
		// generate all data jadwal
		// $data['user'] = $this->M_admin->selectPegawai();
		$nav['nav'] = 2;
		$data['jadwal'] = $this->M_admin->selectJadwal();
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Jadwal/V_Index",$data);
		$this->load->view("V_Footer");
	}


	public function inputJadwal() {
		$data['user'] = $this->M_admin->selectUser();
		$nav['nav'] = 2;
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Jadwal/V_Input",$data);
		$this->load->view("V_Footer");	
	}

/* ----------------------- VIEW LOAD END ----------------------------*/

/* ----------------------- VIEW LOAD DETAIL -------------------------*/

public function jadwalDetail($id = false) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		$data['id_jadwal']	= $plaintext_string;
		$data['list'] = $this->M_admin->getJadwal($plaintext_string);
		$data['id'] = $id;
		$nav['nav'] = 2;
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Jadwal/V_Detail",$data);
		$this->load->view("V_Footer");
}

public function jadwalEdit($id) {
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		// $plaintext_string = $this->encrypt->decode($plaintext_string);
		$id_jadwal = decode($id);
		$data['id_jadwal']	= $id_jadwal;
		$data['list'] = $this->M_admin->getJadwal($id_jadwal);
		// $data['dosen'] = $this->M_admin->selectJadwal();
		$nav['nav'] = 2;
		// echo "<pre>";
		// print_r($data);
		// exit();

		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Jadwal/V_Edit",$data);
		$this->load->view("V_Footer");
}

/*------------------------ VIEW LOAD DETAIL END ----------------------*/

/* ----------------------- INSERT SECTION ----------------------------*/

public function insertJadwal() {
	$id_dosen = $this->session->id_user;
	// $bagian = $this->input->post('bagian');
	// $hari = $this->input->post('hari');

	$tgl = $this->input->post('range_tanggal');
	$tanggal = date('Y-m-d', strtotime($tgl));
	// $range_tgl = explode('-', $tgl);
	// $tgl_awal = date('Y-m-d', strtotime(str_replace('/', '-', $range_tgl[0])));
	// $tgl_akhir = date('Y-m-d', strtotime(str_replace('/', '-', $range_tgl[1])));

	$time_awal = $this->input->post('time_awal');
	$time_akhir = $this->input->post('time_akhir');
	// $hari_pertama = $this->input->post('hari_pertama');
	// $hari_terakhir = $this->input->post('hari_terakhir');
	
	// $time = $time_awal." s/d ".$time_akhir;
	
	$data  = array(
		'id_dosen' => $id_dosen, 
		'tgl_pertama' => $tanggal,
		// 'tgl_terakhir' => $tgl_akhir,
		'jam_pertama' => $time_awal,
		'jam_terakhir' => $time_akhir,
		'quota' => $this->input->post('quota'),
	);
	
	// echo "<pre>";
	// print_r($data);
	// exit();

	if($this->M_admin->insertJadwal($data)) {
		$this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan!');
		redirect('Jadwal/index/simpan');
	} else {
		$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
		redirect('Jadwal/index/error');
	}
}
/*------------------------------- UPDATE SECTION --------------------------------*/

public function updateJadwal() {
	$id_dosen = $this->session->id_user;

	$tgl = $this->input->post('range_tanggal');
	$tanggal = date('Y-m-d', strtotime($tgl));
	// $range_tgl = explode('-', $tgl);
	// $tgl_awal = date('Y-m-d', strtotime(str_replace('/', '-', $range_tgl[0])));
	// $tgl_akhir = date('Y-m-d', strtotime(str_replace('/', '-', $range_tgl[1])));

	$time_awal = $this->input->post('time_awal');
	$time_akhir = $this->input->post('time_akhir');

	$id = $this->input->post('id_jadwal');
	
	$data  = array(
		// 'id_dosen' => $id_dosen, 
		'tgl_pertama' => $tanggal,
		// 'tgl_terakhir' => $tgl_akhir,
		'jam_pertama' => $time_awal,
		'jam_terakhir' => $time_akhir,
		'quota' => $this->input->post('quota'),
	);

	if($this->M_admin->updateJadwal($id,$data)) {
		$this->session->set_flashdata('success', 'Jadwal berhasil diupdate!');
		redirect('Jadwal/index/update');

	} else {
		$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
		redirect('Jadwal/index/error');
	}	
}

/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */

public function deleteJadwal($id) {
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		// $plaintext_string = $this->encrypt->decode($plaintext_string);
		$id_jadwal	= decode($id);
		if($this->M_admin->deleteJadwal($id_jadwal)) {
			$this->session->set_flashdata('success', 'Jadwal berhasil didelete!');
			redirect('Jadwal/index/delete');
		} else {
			$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
			redirect('Jadwal/index/error');
		}	
	}


	/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- FUNCTION SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */



}


