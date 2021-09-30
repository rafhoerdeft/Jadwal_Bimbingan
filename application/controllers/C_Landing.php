<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_Landing extends CI_Controller {

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

  public function index() {
    // $a = $this->db->query("SELECT
    // id_user,
    // nip,
    // nama 
    // FROM tbl_user
    // ")->result_array();
    // echo json_encode($a);
    // die;

    $data['list'] = $this->M_mainmenu->countAntrian();  
    $data['total_antrian'] = $this->M_admin->getCountAntrian();
    $data['sisa_antrian'] = $this->M_admin->getCountSisaAntrian();
    $data['jadwal'] = $this->M_mainmenu->showJadwalHariIni();   
    $data['jadwalGroup'] = $this->M_mainmenu->showGroupJadwalHariIni();   

    $data['dosen']    = $this->db->query("SELECT
                        id_user,
                        nip,
                        nama 
                        FROM tbl_user
                        ")->result_array();
    $this->load->view("V_Landing",$data);
  }

  public function getAntrian(){
    $data['list'] = $this->M_mainmenu->countAntrian();  
    $data['total_antrian'] = $this->M_admin->getCountAntrian();
    $data['sisa_antrian'] = $this->M_admin->getCountSisaAntrian();
    echo json_encode($data);
  }

  public function insertMessage() {
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $pesan = $this->input->post('pesan');
    $data  = array(
      'nama' => $nama,
      'email' => $email,
      'pesan' => $pesan
    );
    if ($this->M_mainmenu->insertHubungi($data)) {
      $this->session->set_flashdata('success','Pesan anda berhasil dikirim!');
    } else {
      $this->session->set_flashdata('error','Terjadi kesalahan saat mengirim pesan anda...');
    }
    redirect('LandingPage');
  }

  public function getDataAntrian($value='') {
    $id_dosen = $this->input->POST('id_dosen');

    if ($id_dosen) {

      $limit = $this->M_mainmenu->getQuota($id_dosen);

      $dataAntrian = $this->M_mainmenu->getAntrian($id_dosen, $limit);

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

  public function getDataAntrianJdwl($value='') {
      $id_jadwal = $this->input->POST('id_jadwal');

      if ($id_jadwal) {

        $dataAntrian = $this->M_mainmenu->getAntrianJadwal($id_jadwal);

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