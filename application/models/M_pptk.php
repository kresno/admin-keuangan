<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pptk extends CI_Model {
	public function select_all() {
		$this->db->select('*');
        $this->db->from('pptk');
        
		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM kegiatan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kegiatan.nama AS kegiatan, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kegiatan, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kegiatan = kegiatan.id AND pegawai.id_kegiatan={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO kegiatan VALUES('','" .$data['kegiatan'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('kegiatan', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE kegiatan SET nama='" .$data['kegiatan'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM kegiatan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('kegiatan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pptk');

		return $data->num_rows();
	}
}

/* End of file M_kegiatan.php */
/* Location: ./application/models/M_kegiatan.php */