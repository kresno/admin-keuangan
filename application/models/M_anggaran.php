<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_anggaran extends CI_Model {
	public function select_all() {
		$this->db->select('*');
        $this->db->from('anggaran');

		$data = $this->db->get();

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM anggaran WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, anggaran.nama AS anggaran, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, anggaran, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_anggaran = anggaran.id AND pegawai.id_anggaran={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO anggaran VALUES('','" .$data['anggaran'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('anggaran', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE anggaran SET nama='" .$data['anggaran'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM anggaran WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('anggaran');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('anggaran');

		return $data->num_rows();
    }
    
    public function sum_anggaran() {
        $sql = "SELECT sum(jml_anggaran) FROM anggaran";

		$data = $this->db->query($sql);

		return $data->row();
    }

    public function sum_realisasi_anggaran() {
        $sql = "SELECT sum(realisasi) FROM anggaran";

		$data = $this->db->query($sql);

		return $data->row();
    }
}

/* End of file M_anggaran.php */
/* Location: ./application/models/M_anggaran.php */