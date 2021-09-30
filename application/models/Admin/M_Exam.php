<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Exam extends CI_Model{
    public function saveDosen()
    {
        $data = array(
            'id'        => $this->input->post('id'),
            'mahasiswa' => $this->input->post('mahasiswa'),
            'antrian'   => $this->input->post('antrian')
        );

        return  $this->db->insert('dosen', $data);

    }
}