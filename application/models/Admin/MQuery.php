<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MQuery extends CI_Model{
	private $logged = array();

	function __construct(){
		parent::__construct();
	}

	function getsiswa($id=null){
		if ($id) {
			$query = "SELECT id_siswa, nama_siswa, nisn, kelas, jurusan, walikelas.nama_walikelas AS walikelas
					  FROM siswa
					  LEFT JOIN walikelas ON walikelas.id_walikelas = siswa.id_walikelas 
					  WHERE id_siswa = ".$this->db->escape($id)."
					  ORDER BY id_siswa
					 ";
		}
		else{
			$query = "SELECT id_siswa, nama_siswa, nisn, kelas, jurusan,  walikelas.nama_walikelas AS walikelas
					  FROM siswa
					  LEFT JOIN walikelas ON walikelas.id_walikelas = siswa.id_walikelas 
					  ORDER BY id_siswa
					 ";
		}
		return $this->db->query($query)->result_array();
	}


	function getsiswaedit($id=null){
		$query = "SELECT * FROM siswa
				  WHERE id_siswa = ".$this->db->escape($id)."
				  ORDER BY id_siswa
				 ";
		return $this->db->query($query)->row_array();
	}

	function getaspek(){
		$query = "SELECT id_aspek, aspek_penilaian, pertanyaan
				  FROM aspek
				  ORDER BY id_aspek
				 ";
		return $this->db->query($query)->result_array();
	}

	function getaspekedit($id=null){
		$query = "SELECT * FROM aspek
				  WHERE id_aspek = ".$this->db->escape($id)."
				  ORDER BY id_aspek
				 ";
		return $this->db->query($query)->row_array();
	}

	function getkriteria(){
		$query = "SELECT id_kriteria, kriteria, bobot, tren
				  FROM kriteria
				  ORDER BY id_kriteria
				 ";
		return $this->db->query($query)->result_array();
	}

	function getkriteriaedit($id=null){
		$query = "SELECT * FROM kriteria
				  WHERE id_kriteria = ".$this->db->escape($id)."
				  ORDER BY id_kriteria
				 ";
		return $this->db->query($query)->row_array();
	}

	function getuser(){
		$query = "SELECT id_user, nama_user, username, level, siswa.nama_siswa referensi_siswa FROM user
				  LEFT JOIN siswa ON id_siswa = referensi_siswa
				  ORDER BY id_user
				 ";
		return $this->db->query($query)->result_array();
	}

	function getuseredit($id=null){
		$query = "SELECT * FROM user
				  WHERE id_user = ".$this->db->escape($id)."
				  ORDER BY id_user
				 ";
		return $this->db->query($query)->row_array();
	}
	function getdosenedit($id=null){
		$query = "SELECT * FROM dosen
				  WHERE id = ".$this->db->escape($id)."
				  ORDER BY id
				 ";
		return $this->db->query($query)->row_array();
	}



	function getwalikelas(){
		return $this->db->query("SELECT * FROM walikelas")->result_array();
	}


	function getlevel(){
		return array('Staf TU','Kepala Sekolah','Siswa');
	}

	function gettrent(){
		return array('Negatif','Positif');
	}

	function getdosen(){
		return $this->db->query("SELECT * FROM 'dosen'")->result_array();
	}

	function getHasil(){
		$list_aspek = $this->getaspek();
		$list_kriteria = $this->getkriteria();
		$tren = $this->db->query("SELECT id_kriteria FROM kriteria WHERE tren = 1")->row()->id_kriteria;
		$r = array();
		$r1 = array();
		$r2 = array();
		foreach ($list_aspek as $key => $value) {
			$q = "SELECT angket.id_aspek,aspek.aspek_penilaian, id_kriteria,COUNT(id_kriteria) total
				  FROM angket
				  LEFT JOIN aspek ON aspek.id_aspek = angket.id_aspek
				  WHERE angket.id_aspek = ".$value['id_aspek']." GROUP BY id_kriteria";
			$f = $this->db->query($q)->result_array();
			$r[] = $f;
			$r3 = array();
			foreach ($f as $key2 => $value2) {
				$r3[$value2['id_kriteria']] = $value2['total'];
			}
			$r3['aspek_penilaian'] = $value['aspek_penilaian'];
			$r3['tren'] = $tren;
			$r2[$value['id_aspek']] = $r3;
			
		}
		// dd($r2);
		foreach ($list_kriteria as $key => $value) {
			foreach ($r2 as $key2 => $value2) {
				if (array_key_exists($value['id_kriteria'], $value2)) {
					$r5[$key2]=$value2[$value['id_kriteria']];
				}else{
					$r5[$key2]=0;
				}
			}
			$r4[$value['id_kriteria']]=$r5;
			$r4[$value['id_kriteria']]['max']=max($r5);
			@$r4[$value['id_kriteria']]['min']=min(array_filter($r5));
		}
		return array('by_aspek' => $r2,'by_kriteria'=>$r4);
	}

	function countsiswa(){
		return $this->db->query("SELECT COUNT(id_siswa) siswa FROM siswa")->row()->siswa;
	}

	function countangket(){
		return $this->db->query("SELECT * FROM angket GROUP BY id_siswa")->num_rows();

	}
}
