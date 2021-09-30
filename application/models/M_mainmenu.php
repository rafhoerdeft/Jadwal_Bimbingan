<?php
class M_mainmenu extends CI_Model {

	public function __construct() {
		$this->load->database();
		// $this->load->library('encrypt');
		$this->load->helper('encrypt');
	}


/* ---------------------- DAFTAR PAGE ---------------------- */	
	public function generate($id){
		$select = array(
			'*',
			'tbl_jadwal.tgl_pertama tgl_bimbingan',
			'tbl_pendaftaran.nama nama_user'
		);
		$this->db->select($select);
		$this->db->from('tbl_antrian');
		$this->db->join('tbl_pendaftaran','tbl_antrian.id_antrian = tbl_pendaftaran.id_antrian', 'outter');
		$this->db->join('tbl_jadwal','tbl_jadwal.id_jadwal = tbl_pendaftaran.id_jadwal', 'outter');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_pendaftaran.id_user', 'outter');
		// $this->db->join('tbl_dokter','tbl_dokter.id_dok = tbl_pendaftaran.id_dokter', 'outter');
		// $this->db->join('tbl_layanan','tbl_dokter.id_layanan = tbl_layanan.id_layanan', 'outter');
		// $this->db->join('tbl_jamkes','tbl_pendaftaran.id_jamkes = tbl_jamkes.id_jamkes', 'outter');
		
		$this->db->where('tbl_antrian.id_antrian',$id);

		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}



	public function selectJadwal($data){
		$this->db->select('*');
		$this->db->from('tbl_user');
		// $this->db->join('tbl_layanan','tbl_dokter.id_layanan = tbl_layanan.id_layanan', 'inner');
		$this->db->join('tbl_jadwal','tbl_jadwal.id_user = tbl_user.id_user','inner');
		$this->db->where($data);

		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function showJadwalSemua(){
		$getData = $this->db->query("
			SELECT 
				jdwl.*,
				(SELECT COUNT(dft.id_daftar) FROM tbl_pendaftaran dft WHERE dft.id_jadwal = jdwl.id_jadwal) jml_daftar
			FROM 
				tbl_jadwal jdwl
			WHERE 
				CURDATE() <= tgl_pertama 
			ORDER BY
				jam_pertama
		
		")->result_array();

		return $getData;
	}

	public function showGroupJadwalSemua(){
		$getData = $this->db->query("
			SELECT 
				jdwl.*,
				(SELECT usr.nama FROM tbl_user usr WHERE usr.id_user = jdwl.id_dosen) nama_dosen
			FROM 
				tbl_jadwal jdwl
			WHERE 
				CURDATE() <= tgl_pertama  
			GROUP BY
				id_dosen
			ORDER BY
				jam_pertama
		
		")->result_array();

		return $getData;
	}

	public function showJadwalHariIni(){
		$getData = $this->db->query("
			SELECT 
				jdwl.*
			FROM 
				tbl_jadwal jdwl
			WHERE 
				CURDATE() = tgl_pertama
			ORDER BY
				jam_pertama
		
		")->result_array();

		return $getData;
	}

	public function showGroupJadwalHariIni(){
		$getData = $this->db->query("
			SELECT 
				jdwl.*,
				(SELECT usr.nama FROM tbl_user usr WHERE usr.id_user = jdwl.id_dosen) nama_dosen,
				(SELECT COUNT(dft.id_daftar) FROM tbl_pendaftaran dft WHERE dft.id_jadwal = jdwl.id_jadwal) jml_daftar
			FROM 
				tbl_jadwal jdwl
			WHERE 
				CURDATE() = tgl_pertama 
			GROUP BY
				id_dosen
			ORDER BY
				jam_pertama
		
		")->result_array();

		return $getData;
	}

	function cekByRangeTanggal($dateToCheck, $start_date, $end_date) {
	  $start = strtotime($start_date);
	  $end = strtotime($end_date);
	  $date = strtotime($dateToCheck);

	  // Check that user date is between start & end
	  return (($date > $start) && ($date < $end));
	}

	public function selectJamkes(){
		$this->db->select('*');;
		$this->db->from('tbl_jamkes');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	
	public function selectUser(){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;
		}
	}

	public function selectJadwalDosen($id='') {

		$getData = $this->db->query("
			SELECT 
				jd.*,
				(SELECT COUNT(dft.id_daftar) FROM tbl_pendaftaran dft WHERE dft.id_jadwal = jd.id_jadwal) jml_daftar
			FROM 
				tbl_jadwal jd
			WHERE 
				id_dosen = $id AND
				CURDATE() <= tgl_pertama 
			ORDER BY
				jam_pertama DESC
		
		")->result_array();

		return $getData;

		// $select = array(
		// 	'jd.*',
		// 	"(SELECT COUNT(dft.id_daftar) FROM tbl_pendaftaran dft WHERE dft.id_jadwal = jd.id_jadwal) jml_daftar"
		// );
		// return $this->db->SELECT($select)
		// 				->where('id_dosen', $id)
		// 		 		->get('tbl_jadwal jd')->result_array();
	}

	public function countAntrian($daftar = false){

		$date = date('Y-m-d');

		$this->db->select('antrian,tanggal');
		$this->db->from('tbl_antrian');
		$this->db->where('tanggal',$date);
		$this->db->where('status != 1');
		if($daftar){
			$this->db->order_by('antrian','desc');	
		}else{
			$this->db->order_by('antrian','asc');
		}
		
		
		$this->db->order_by('tanggal','desc');
		
		$data = $this->db->get();
		if($data->num_rows() > 0){
			return $data->result_array();
		}else{
			return false;	
		}
	}

	public function getQuota($id_dosen='') {
		return $this->db->query("
					SELECT 
						SUM(floor(((TIME_TO_SEC(jam_terakhir) - TIME_TO_SEC(jam_pertama))/60)/20)) AS quota
					FROM 
						tbl_jadwal 
					WHERE 
						id_dosen = $id_dosen"
				)->row()->quota;
	}

	public function getAntrian($id_user='', $limit=0) {

		if ($limit!=0) {
			$lmt = "LIMIT $limit";
		} else {
			$lmt = '';
		}

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
			-- LEFT JOIN tbl_user ON tbl_pendaftaran.id_user = tbl_user.id_user
			WHERE	
				tbl_antrian.status != 1 AND
				tbl_pendaftaran.id_user = '$id_user'
			ORDER BY tbl_pendaftaran.id_daftar ASC
			$lmt
		")->result_array();
	}

	public function getAntrianJadwal($id_jadwal='') {

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
			-- LEFT JOIN tbl_user ON tbl_pendaftaran.id_jadwal = tbl_user.id_jadwal
			WHERE	
				tbl_antrian.status != 1 AND
				tbl_pendaftaran.id_jadwal = '$id_jadwal'
			ORDER BY tbl_pendaftaran.id_daftar ASC
		")->result_array();
	}

	public function getAntrianJadwalAll($id_jadwal='') {

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
			-- LEFT JOIN tbl_user ON tbl_pendaftaran.id_jadwal = tbl_user.id_jadwal
			WHERE	
				-- tbl_antrian.status != 1 AND
				tbl_pendaftaran.id_jadwal = '$id_jadwal'
			ORDER BY tbl_pendaftaran.id_daftar ASC
		")->result_array();
	}

	public function insertDaftar($data){
		return $this->db->insert('tbl_pendaftaran',$data);
	}

	public function insertAntrian($data){
		$this->db->insert('tbl_antrian',$data);
		 return $this->db->insert_id();
	}

	public function insertHubungi($data){
		return $this->db->insert('tbl_hubungi',$data);
	}

	public function getuser(){
		$query = $this->db->get('tbl_user');
		return $query->result_array();
	}
	
	
}
?>