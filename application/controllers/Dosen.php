<?php
class Dosen extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_mainmenu');
		$this->load->model('Admin/M_admin');
		$this->load->model('Admin/M_Exam');
		date_default_timezone_set("Asia/Bangkok");
	}
	
	public function index($status=false) {
		// generate all data jadwal
		// $data['user'] = $this->M_admin->selectPegawai();
		$data['jadwal'] = $this->M_admin->selectDosen();
		$this->load->view("V_Header");
		$this->load->view("Mainmenu/V_Dosen",$data);
		$this->load->view("V_Footer");
	}

	public function tambahDosen() {
		$data['dosen'] = $this->M_admin->selectDosen();
		$this->load->view("V_Header");
		$this->load->view("Mainmenu/Dosen/Input",$data);
		$this->load->view("V_Footer");	

		
	}

	public function insertDosen()
	{

		// $a =  $this->input->post('id');
		// echo json_encode($a);
		// die;
		
		$save = $this->M_Exam->saveDosen();


		if($save) {
			
				$this->session->set_flashdata('berhasil');
				redirect('Dosen');
		} else {
			// $sess['alert'] = alert_failed('gagal di tambah');
			$this->session->set_flashdata('gagal');
			redirect('Dosen');
		}


	
	}

	public function alert_succes(Type $var = null)
	{
		# code...
	}
	/* ----------------------- VIEW LOAD DETAIL -------------------------*/
	// public function insertDosen() {
	// 	$id = $this->input->post('id');
	// 	// $bagian = $this->input->post('bagian');
	// 	$mahasiswa = $this->input->post('mahasiswa');
	// 	$antrian = $this->input->post('antrian');
	// 	$time_akhir = $this->input->post('time_akhir');
	// 	$hari_pertama = $this->input->post('hari_pertama');
	// 	$hari_terakhir = $this->input->post('hari_terakhir');
		
	// 	// $time = $time_awal." s/d ".$time_akhir;
		
	// 	$data  = array(
	// 			'id_dosen' => $id_dosen, 
	// 			'hari_pertama' => $hari_pertama,
	// 			'hari_terakhir' => $hari_terakhir,
	// 			'jam_pertama' => $time_awal,
	// 			'jam_terakhir' => $time_akhir
	// 			);
		
		// echo "<pre>";
		// print_r($data);
		// exit();
	
		// if($this->M_admin->insertJadwal($data)) {
		// 	$this->session->set_flashdata('success', 'Jadwal berhasil ditambahkan!');
		// 	redirect('Jadwal/index/simpan');
		// } else {
		// 	$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
		// 	redirect('Jadwal/index/error');
		// }
	// public function insertDosen() {
	// 	$id = $this->input->post('id');
	// 	$mahasiswa = $this->input->post('harmahasiswai');
	// 	$antrian = $this->input->post('antrian');
	// 	// $time_akhir = $this->input->post('time_akhir');
	// 	// $hari_pertama = $this->input->post('hari_pertama');
	// 	// $hari_terakhir = $this->input->post('hari_terakhir');
		
	// 	// // $time = $time_awal." s/d ".$time_akhir;
		
	// 	$data  = array(
	// 			'id' => $id, 
	// 			'mahasiswa' => $mahasiswa,
	// 			'antrian' => $antrian,
				
	// 			);
	// public function index()
	// {
	// 	$this->load->view('Mainmenu/V_Dosen');
	// }

	// public function insertData() {
	// 	// $data['dosen'] = $this->M_admin->selectDosen();
	// 	$id = $this->input->post('id');
	// 	$mahasiswa = $this->input->post('mahasiswa');
	// 	$antrian = $this->input->post('antrian');
	// 		$data  = array(
	// 			'id' => $id,
	// 			'mahasiswa' => $mahasiswa,
	// 			'antrian' => $antrian,
				
	// 			);
	// 			if($this->M_admin->insertDosen($data)) {
	// 				$this->session->set_flashdata('success', 'data berhasil ditambahkan!');
	// 				redirect('Dosen/index');
	// 			} else {
	// 				$this->session->set_flashdata('error', 'Terjadi error pada saat insert ke database');
	// 				redirect('Dosen/input');
	// 			}
    // function hapus($id=null){
	// 	$del = $this->db->where('id',$id)->delete('dosen');
	// 	if ($del) {
	// 		$this->dosen();
	// 	}
	// }
	}