<?php
class C_Daftar extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_mainmenu');
		date_default_timezone_set("Asia/Bangkok");
	}


	public function index() {
		$data['user'] = $this->M_mainmenu->selectUser();

		$this->load->view("MainMenu/V_Daftar",$data);
	}

	public function selectJadwalDosen($value='') {
		$id = $this->input->POST('id');

		if ($id) {
			$data = $this->M_mainmenu->selectJadwalDosen($id);

			if ($data) {
				$result = array(
					'response' 	=> true,
					'data'		=> $data
				);
			} else {
				$result = array(
					'response'	=> false
				);
			}

		} else {
			$result = array(
				'response'	=> false
			);
		}

		echo json_encode($result);
	}

	public function generate($id){
		// $plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
		$ids = decode($id);

		$data =  array();
		$data['list'] = $this->M_mainmenu->generate($ids);
		$this->load->view("MainMenu/V_Generate",$data);
	}



	public function insertDaftar() {
		
		$nama = $this->input->post('nama');
		$tanggal_daftar = date('Y-m-d');
		$nim = $this->input->post('nim');
		$topik_bimbingan = $this->input->post('topik_bimbingan');
		$id_user = $this->input->post('id_user');
		$id_jadwal = $this->input->post('id_jadwal');
	

		$antrian = $this->getAntrian($id_user, $id_jadwal);

		$data  = array(
			'id_antrian' => $antrian,
			'nama' => $nama, 
			'tanggal_daftar' => $tanggal_daftar, 	
			'nim' => $nim,
			'topik_bimbingan' => $topik_bimbingan,
			'id_user' => $id_user,
			'id_jadwal' => $id_jadwal	

		);
		$id = encode($antrian);
		// $id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);

		if($this->M_mainmenu->insertDaftar($data)) {
			redirect('Daftar/generate/'.$id);
		} else {
			redirect('Daftar/error');
		}
	}


	public function getAntrian($id_user, $id_jadwal){
		$antrian = '';

		$tgl_bimbingan = $this->db->query("SELECT tgl_pertama FROM tbl_jadwal WHERE id_jadwal = $id_jadwal")->row()->tgl_pertama;

		$kode = $this->db->query("SELECT
		id_user FROM tbl_user WHERE
		id_user = $id_user
		")->row_array();
		
		$x=$kode['id_user'];
		$qwe= $this->db->query("SELECT SUBSTR(tbl_antrian.antrian, 3,3) As kode FROM tbl_antrian WHERE antrian like '%$x%' AND tgl_bimbingan = '$tgl_bimbingan' order by SUBSTR(tbl_antrian.antrian, 3,3) DESC")->result_array();
		
		if(empty($qwe)){
			$antrian = $kode['id_user'].sprintf('%03s', 1);
		} else {
			$antrian = $kode['id_user'].sprintf('%03s', (count($qwe) + 1));
		}

		$tanggal = date('Y-m-d');
		$data = array(
			'tanggal' 		=> $tanggal,
			'antrian' 		=> $antrian,
			'id_jadwal'		=> $id_jadwal,
			'tgl_bimbingan'	=> $tgl_bimbingan
		);
			// echo "<pre>";
			// print_r(count($qwe) + 1);
			// exit();
		$antrian = $this->M_mainmenu->insertAntrian($data);

		// if($qwe!=null){
		// 	$qwe
		// }

		// if($data = $this->M_mainmenu->countAntrian(true)){
		// 	echo json_encode($data);
		// 	die;

		// 	foreach ($data as $key => $value) {
		// 		$no_urut = (int) substr($value,2,3);
		// 	}
			
		// 	echo json_encode($no_urut);
		// 	die;
		// 	$antrian = $kode['id_user'].sprintf('%03s', $no_urut++);
			
			
		// 	// if(strlen($no_urut) == 1){
		// 	// 	$antrian = "A00".((int) $no_urut + 1);
		// 	// }else if(strlen($no_urut) == 2){
		// 	// 	$antrian = "A0".((int) $no_urut + 1);
		// 	// }else{
		// 	// 	$antrian = "A".((int) $no_urut + 1);
		// 	// }

		// 	$tanggal = date('Y-m-d');

		// 	$data = array(
		// 		'tanggal' => $tanggal,
		// 		'antrian' => $antrian
		// 	);

		// 	// echo "<pre>";
		// 	// print_r($data);
		// 	// exit();
		// 	$antrian = $this->M_mainmenu->insertAntrian($data);

			
		// }else{
		// 	$antrian = $kode['id_user'].sprintf('%03s', 1);
		// 	$tanggal = date('Y-m-d');

		// 	$data = array(
		// 		'tanggal' => $tanggal,
		// 		'antrian' => $antrian
		// 	);

		// 	$antrian = $this->M_mainmenu->insertAntrian($data);
		// }
		return $antrian;
	}

	public function getDokter(){
		
		$where = array(
			'tbl_layanan.id_layanan' => $this->input->post('id_layanan_medis'), 
		);
		


		$data = $this->M_mainmenu->selectJadwalUser($where);
		$dokter = false;

		foreach ($data as $value) {
			$hari = date('N');
			$jam = date('H:i:s');
			if($hari  >= $value['hari_pertama'] && $hari <= $value['hari_terakhir']){
				if($jam > $value['jam_pertama'] && $jam < $value['jam_terakhir']){
					$dokter[] = $value;	
				}
			}
		}
		// echo "<pre>";
		// print_r($dokter);
		// exit();
		echo json_encode($dokter);
			


	}


}
