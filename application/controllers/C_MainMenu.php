<?php
class C_MainMenu extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('encrypt');
		$this->load->helper('html');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('M_mainmenu');
		$this->load->model('Admin/M_admin');
		date_default_timezone_set("Asia/Bangkok");
	}

	public function dosen() {
		$data['dosen'] = $this->M_admin->selectDosen();
		$this->load->view("MainMenu/V_Dosen",$data);
	}
	// public function deleteDosen($id) {
	// 	$plaintext_string = str_replace(array('-', '_', '~'), array('+', '/', '='), $id);
	// 	$plaintext_string = $this->encrypt->decode($plaintext_string);
	// 	$id	= $plaintext_string;
	// 	if($this->M_admin->deleteDosen($id)) {
	// 		$this->session->set_flashdata('success', 'data berhasil didelete!');
	// 		redirect('Mainmenu/Dosen/delete');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Ada kesalahan pada proses data');
	// 		redirect('Mainmenu/Dosen/error');
	// 	}	
	// }
	public function jadwal() {

		// echo "ini jadwal dosen";
		// die;
		$data['jadwal'] = $this->M_mainmenu->showJadwalSemua();   
		$data['jadwalGroup'] = $this->M_mainmenu->showGroupJadwalSemua();  

		// echo json_encode($data['jadwal']);
		// die;
		$this->load->view("MainMenu/V_Jadwal",$data);
	}

	

	public function layanan(){
		$data['layanan'] = $this->M_admin->selectLayanan();
		$this->load->view("MainMenu/V_Layanan",$data);	
	}

	public function getDataAntrianAll($value='') {
	    $id_dosen = $this->input->POST('id_dosen');

	    if ($id_dosen) {

	      // $limit = $this->M_mainmenu->getQuota($id_dosen);

	      $dataAntrian = $this->M_mainmenu->getAntrian($id_dosen);

	      if ($dataAntrian) {
	        $result = array(
	          'response' => true,
	          'data' => $dataAntrian
	        );
	      } else {
	        $result = array(
	          'response' => false
	        );
	      }
	    } else {
	      $result = array(
	        'response' => false
	      );
	    }

	    echo json_encode($result);
	}

	public function getDataAntrian($value='') {
	    $id_jadwal = $this->input->POST('id_jadwal');

	    if ($id_jadwal) {

	      $dataAntrian = $this->M_mainmenu->getAntrianJadwalAll($id_jadwal);

	      if ($dataAntrian) {
	        $result = array(
	          'response' => true,
	          'data' => $dataAntrian
	        );
	      } else {
	        $result = array(
	          'response' => false
	        );
	      }
	    } else {
	      $result = array(
	        'response' => false
	      );
	    }

	    echo json_encode($result);
	}
}
