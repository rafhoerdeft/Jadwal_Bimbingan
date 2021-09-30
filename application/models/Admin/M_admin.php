<?php
class M_admin extends CI_Model {



	public function __construct() {
		$this->load->database();
		// $this->load->library('encrypt');
		$this->load->helper('encrypt');
		$this->id_user = $this->session->userdata('id_user');
	}

	public function jmlAntrianMasukHariIni($value='') {
		$date = date('Y-m-d');
		$id_user = $this->id_user;
		$data = $this->db->query("
				SELECT 
					id_antrian
				FROM 
					tbl_pendaftaran
				WHERE 
					tanggal_daftar = '$date' 
						AND
					id_user = $id_user 
						AND
					id_antrian 
						IN (SELECT id_antrian FROM tbl_antrian WHERE status != 1)
			");
		return $data->num_rows();
	}

	public function totAntrian($value='') {
		$id_user = $this->id_user;
		$data = $this->db->query("
				SELECT 
					id_antrian
				FROM 
					tbl_pendaftaran
				WHERE 
					id_user = $id_user 
						AND
					id_antrian 
						IN (SELECT id_antrian FROM tbl_antrian WHERE status != 1)
			");
		return $data->num_rows();
	}

	

	/* -=-=-=-=-=-=-=-=-=-=- INSERT SECTION -=-=-=-=-=-=-=-=-=-=-=- */
	public function insertPegawai($data){
		return $this->db->insert('tbl_dokter',$data);
	}

	public function insertLayanan($data){
		return $this->db->insert('tbl_layanan',$data);
	}

	public function insertUser($data){
		return $this->db->insert('tbl_user',$data);
	}

	public function insertJadwal($data){
		return $this->db->insert('tbl_jadwal',$data);
	}

	public function insertJamkes($data){
		return $this->db->insert('tbl_jamkes',$data);
	}

	public function insertHubungi($data){
		return $this->db->insert('tbl_jamkes',$data);
	}
	public function insertDosen($data){
		return $this->db->insert('dosen',$data);
	}

	/*-=--=-=-=-=-=-=--=-=-= SELECT MAIN SECTION -=-=-=-=-=-=-=-=-=-=-=-= */

	public function getCountAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	public function getCountSisaAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status','0');
		$this->db->group_by('antrian');

		$data = $this->db->get();

		return $data->num_rows();
	}

	public function getCurrentAntrian(){
		$date = date('Y-m-d');
		$select = array('*');
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status','0');
		$this->db->order_by('antrian','asc');
		
		
		$data = $this->db->get();

		return $data->result_array();
	}



	/*-=--=-=-=-=-=-=--=-=-= SELECT SECTION -=-=-=-=-=-=-=-=-=-=-=-= */
	public function selectPegawai(){
		$this->db->select('tbl_dokter.*,tbl_layanan.*');;
		$this->db->from('tbl_dokter');
		$this->db->join('tbl_layanan','tbl_dokter.id_layanan = tbl_layanan.id_layanan', 'left');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getPegawai($id){
		$this->db->where('id_dok',$id);
		$data = $this->db->get('tbl_dokter');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectLayanan(){
		$data = $this->db->get('tbl_layanan');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getLayanan($id){
		$this->db->where('id_layanan',$id);
		$data = $this->db->get('tbl_layanan');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectUser(){
		$data = $this->db->get('tbl_user');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getUser($id){
		$this->db->where('id_user',$id);
		$data = $this->db->get('tbl_user');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectJadwal(){
		$id_user = $this->id_user;

		$getData = $this->db->query("
			SELECT
				*
			From
				tbl_jadwal
			WHERE
				id_dosen = $id_user
			ORDER BY
				id_jadwal DESC
		
		")->result_array();
		return $getData;
		

		// $getData = $this->db->query("SELECT
		// tbl_jadwal.*,
		// tbl_user.id_user,
		// tbl_user.nama,
		// tbl_pendaftaran.id_user as id_dosen_pendaftaran
		// From
		// tbl_jadwal
		// INNER JOIN
		// tbl_user ON
		// tbl_jadwal.id_dosen = tbl_user.id_user
		// INNER JOIN 
		// tbl_pendaftaran ON
		// tbl_user.id_user = tbl_pendaftaran.id_user
		// ")->result_array();
		// return $getData;
		

		
		// $this->db->select('tbl_jadwal.*,tbl_user.*');;
		// $this->db->from('tbl_jadwal');
		// $this->db->join('tbl_user','tbl_user.id_user = tbl_jadwal.id_dosen', 'inner');
		
		// $data = $this->db->get();
		// if($data->num_rows() > 0){
		// 	return $data->result_array();
		// }else{
		// 	return false;
		// }
	}

	public function getJadwal($id){
		$this->db->where('id_jadwal',$id);
		$data = $this->db->get('tbl_jadwal');
		if($data->num_rows() > 0){
			return $data->row_array();
		}else{
			return false;
		}	
	}

	


	public function selectHubungi(){
		$this->db->select('*');
		$this->db->from('tbl_hubungi');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function getHubungi($id){
		$this->db->where('id_hubungi',$id);
		$data = $this->db->get('tbl_hubungi');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}	
	}

	public function selectAntrian(){
		$id_user = $this->id_user;
		return $this->db->query("
			SELECT
				tbl_antrian.* , 
				tbl_pendaftaran.nama nama_mhs,
				tbl_pendaftaran.nim,
				tbl_pendaftaran.topik_bimbingan
				-- tbl_user.username
			FROM
				tbl_antrian
			LEFT JOIN tbl_pendaftaran ON tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian
			LEFT JOIN tbl_jadwal ON tbl_pendaftaran.id_jadwal = tbl_jadwal.id_jadwal
			WHERE	
				tbl_antrian.status != 1 AND
				tbl_pendaftaran.id_user = '$id_user' AND
				tbl_jadwal.tgl_pertama = CURDATE()
			ORDER BY tbl_pendaftaran.id_daftar ASC
		")->result_array();
	}

	public function selectAntrianNow(){
		$id_user = $this->id_user;
		return $this->db->query("
			SELECT
				tbl_antrian.*
			FROM
				tbl_antrian
			LEFT JOIN tbl_pendaftaran ON tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian
			LEFT JOIN tbl_jadwal ON tbl_pendaftaran.id_jadwal = tbl_jadwal.id_jadwal
			WHERE	
				tbl_antrian.status = 0 AND
				tbl_pendaftaran.id_user = '$id_user' AND 
				tbl_jadwal.tgl_pertama = CURDATE()
			ORDER BY tbl_pendaftaran.id_daftar ASC
			LIMIT 1
		")->row_array();
	}

	public function getAntrian($id){		
		$this->db->select('*');
		$this->db->from('tbl_antrian');
		$this->db->join('tbl_pendaftaran','tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian', 'outter');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_pendaftaran.id_user', 'outter');
		$this->db->join('tbl_layanan','tbl_dokter.id_layanan = tbl_layanan.id_layanan', 'outter');	
		$this->db->join('tbl_jamkes','tbl_pendaftaran.id_jamkes = tbl_jamkes.id_jamkes', 'outter');
		$this->db->where('tbl_antrian.id_antrian',$id);
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}

	
	}
	
	
	public function selectDosen(){
		$data = $this->db->get('dosen');
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}
	function getdDosen(){
		return $this->db->query("SELECT * FROM dosen")->result_array();
	}

	/* -=-=-=-=-=-=-=-=-=-=- UPDATE SECTION -=-=-=-=-=-=-=-=-=-=- */
	public function updatePegawai($id,$data){
		$this->db->where('id_dok',$id);
		return $this->db->update('tbl_dokter',$data);
	}

	public function updateLayanan($id,$data){
		$this->db->where('id_layanan',$id);
		return $this->db->update('tbl_layanan',$data);
	}

	public function updateUser($id,$data){
		$this->db->where('id_user',$id);
		return $this->db->update('tbl_user',$data);
	}


	public function updateJadwal($id,$data){
		$this->db->where('id_jadwal',$id);
		return $this->db->update('tbl_jadwal',$data);
	}

	public function updateHubungi($id,$data){
		$this->db->where('id_hubungi',$id);
		return $this->db->update('tbl_hubungi',$data);
	}

	public function skipAntrian($id){
		$this->db->set('status','2');
		$this->db->where('id_antrian',$id);
		return $this->db->update('tbl_antrian');
	}

	/* -=-=-=-=-=-=-=-=-=-=- DELETE SECTION -=-=-=-=-=-=-=-=-=-=- */
	public function deletePegawai($id){
		$this->db->where('id_dok',$id);
		return $this->db->delete('tbl_dokter');
	}

	public function deleteLayanan($id){
		$this->db->where('id_layanan',$id);
		return $this->db->delete('tbl_layanan');
	}

	public function deleteUser($id){
		$this->db->where('id_user',$id);
		return $this->db->delete('tbl_user');
	}

	public function deleteJadwal($id){
		$this->db->where('id_jadwal',$id);
		return $this->db->delete('tbl_jadwal');
	}

	public function deleteJamkes($id){
		$this->db->where('id_jamkes',$id);
		return $this->db->delete('tbl_jamkes');
	}

	public function deleteHubungi($id){
		$this->db->where('id_hubungi',$id);
		return $this->db->delete('tbl_hubungi');
	}
	public function deleteAntrian($id){
		$this->db->where('id_antrian',$id);
		return $this->db->delete('tbl_antrian');
	}
	public function deleteDosen($id){
		$this->db->where('id',$id);
		return $this->db->delete('dosen');
	}

	public function selesaiAntrian($id='') {
		$data = array(
			'status' => 1
		);
		$this->db->WHERE('id_antrian', $id);
		return $this->db->update('tbl_antrian',$data);
	}


}
?>