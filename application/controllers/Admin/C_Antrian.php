<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Antrian extends CI_Controller {

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
		// generate all data antrian
		
		$data['total_antrian'] = $this->M_admin->getCountAntrian();
		$data['sisa_antrian'] = $this->M_admin->getCountSisaAntrian();
		$data['current_antrian'] = $this->M_admin->getCurrentAntrian();

		$data['antrian'] = $this->M_admin->selectAntrian();
		$data['antrianNow'] = $this->M_admin->selectAntrianNow();

		$nav['nav'] = 3;
		// echo "<pre>";
		// print_r($data);
		// exit();
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Antrian/V_Index",$data);
		$this->load->view("V_Footer");
	}


	public function inputAntrian() {
		$data['dokter'] = $this->M_admin->selectPegawai();
		$data['jamkes'] = $this->M_admin->selectJamkes();
		$nav['nav'] = 3;
		
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Antrian/V_Input",$data);
		$this->load->view("V_Footer");	
	}

	public function selesaiAntrian($id='') {
		if($this->M_admin->selesaiAntrian(decode($id))) {
			$this->session->set_flashdata('success', 'Antrian berhasil diupdate!');
			redirect('Antrian/index');
		} else {
			$this->session->set_flashdata('error', 'Antrian gagal diupdate!');
			redirect('Antrian/index');
		}	
	}


/* ----------------------- VIEW LOAD DETAIL -------------------------*/

public function antrianDetail($id = false) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		
		$data['id_antrian']	= $plaintext_string;
		$data['list'] = $this->M_admin->getAntrian($plaintext_string);
		$data['id'] = $id;
		$nav['nav'] = 3;

		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Antrian/V_Detail",$data);
		$this->load->view("V_Footer");
}

public function antrianEdit($id = false) {
		$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$plaintext_string = $this->encrypt->decode($plaintext_string);
		
		$data['id_antrian']	= $plaintext_string;
		$data['list'] = $this->M_admin->getAntrian($plaintext_string);
		$data['id_dosen'] = $this->M_admin->selectUser();
		$nav['nav'] = 3;
		
		
		$this->load->view("V_Header");
		$this->load->view('Admin/V_Navigation', $nav);
		$this->load->view("Admin/Antrian/V_Edit",$data);
		$this->load->view("V_Footer");
}


/* ----------------------- INSERT SECTION ----------------------------*/

	public function insertAntrian() {

		$nama = $this->input->post('nama');
		$tanggal_besuk = date('Y-m-d');
		$nim = $this->input->post('nim');
		$topik_bimbingan = $this->input->post('topik_bimbingan');
		$id_user = $this->input->post('id_user');
		
		$antrian = $this->getAntrian();

		$data  = array(
			'id_antrian' => $antrian,
			'nama' => $nama, 
			'tanggal_besuk' => $tanggal_besuk, 	
			'nim' => $nim,
			'topik_bimbingan' => $topik_bimbingan,
			'id_user' => $id_user,

		);
		// echo "<pre>";
		// print_r($data);
		// exit();

		/* Encrypt ID */
		$encrypted_string = $this->encrypt->encode($antrian);
		$id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);

		if($this->M_mainmenu->insertDaftar($data)) {
			redirect('Daftar/generate/'.$id);
		} else {
			redirect('Daftar/error');
		}
	}

/*------------------------------- UPDATE SECTION --------------------------------*/

	public function updateAntrian() {

		$id_pendaftaran = $this->input->post('id_pendaftaran');
		$id_dokter = $this->input->post('id_dokter');
		$nama = $this->input->post('nama');
		$umur = $this->input->post('umur');
		$berat_badan = $this->input->post('berat_badan');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tanggal_besuk = $this->input->post('tanggal_besuk');
		$alamat = $this->input->post('alamat');
		$penyakit = $this->input->post('penyakit');
		$id_jamkes = $this->input->post('jamkes');


		$data  = array(
			
		);
		// echo "<pre>";
		// print_r($data);
		// exit();

		/* Encrypt ID */
		$encrypted_string = $this->encrypt->encode($antrian);
		$id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);

		if($this->M_mainmenu->insertDaftar($data)) {
			redirect('Daftar/generate/'.$id);
		} else {
			redirect('Daftar/error');
		}

		
		if($this->M_admin->updateAntrian($id,$data)) {
			$this->session->set_flashdata('success', 'Antrian berhasil diupdate!');
			redirect('Antrian/index/update');
		} else {
			$this->session->set_flashdata('error', 'Jadwal berhasil didelete!');
			redirect('Antrian/index/error');
		}	
	}

	public function skipAntrian($id) {
		
		$id_antrian	= decode($id);
		
		if($this->M_admin->skipAntrian($id_antrian)) {
			$this->session->set_flashdata('success', 'Antrian Dilewati!');
			redirect('Antrian/index');
		} else {
			$this->session->set_flashdata('error', 'Gagal melakukan operasi!');
			redirect('Antrian/index');
		}	
	}

	public function deleteAntrian($id) {
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		// $plaintext_string = $this->encrypt->decode($plaintext_string);
		// $id_dok	= $plaintext_string;
		if($this->M_admin->deleteAntrian(decode($id))) {
			$this->session->set_flashdata('success', 'Jadwal berhasil dihapus!');
			redirect('Antrian/index/delete');
		} else {
			$this->session->set_flashdata('error', 'Jadwal gagal dihapus!');
			redirect('Antrian/index/error');
		}	
	}

/*-=-=-=-=-=-=-=-=-=--=-=-=-=-=- Function() SECTION -=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-= */

public function getAntrian(){
		$antrian = '';
		
		if($data = $this->M_mainmenu->countAntrian(true)){

			$no_urut = (int) substr($data[0]['antrian'],1,3);
			
			if(strlen($no_urut) == 1){
				$antrian = "A00".((int) $no_urut + 1);
			}else if(strlen($no_urut) == 2){
				$antrian = "A0".((int) $no_urut + 1);
			}else{
				$antrian = "A".((int) $no_urut + 1);
			}

			$tanggal = date('Y-m-d');

			$data = array(
				'tanggal' => $tanggal,
				'antrian' => $antrian
			);

			// echo "<pre>";
			// print_r($data);
			// exit();
			$antrian = $this->M_mainmenu->insertAntrian($data);

			
		}else{
			$antrian = 'A001';
			$tanggal = date('Y-m-d');

			$data = array(
				'tanggal' => $tanggal,
				'antrian' => $antrian
			);

			$antrian = $this->M_mainmenu->insertAntrian($data);
		}
		return $antrian;
	}








}

