<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_npd extends CI_Model {
	public function select_all() {
		$this->db->select('*');
        $this->db->from('npd');
		$data = $this->db->get();

		return $data->result();
	}

	public function update($data, $id) {
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM npd WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		// $sql = "INSERT INTO npd VALUES('','" .$data['nomor_rek'].','.$data['keterangan'].','.$data['anggaran'] ."')";
		// $sql = "INSERT INTO npd VALUES('', " .$data['nomor_rek'].",".$data['keterangan'].",".$data['anggaran']. ")";
		// $sql = $this->db->insert('npd', $data);
		$sql = "INSERT INTO npd VALUES('','" .$data['nomor_rek'] ."','" .$data['keterangan'] ."','" .$data['nomor_rek'] ."',CURRENT_TIMESTAMP,0)";


		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('npd', $data);
		
		return $this->db->affected_rows();
	}

	public function select($id = '') {
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function verif($id) {
		$sql = "UPDATE npd set status='1' WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */