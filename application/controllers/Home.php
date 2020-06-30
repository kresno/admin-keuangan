<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('M_anggaran');
		$this->load->model('M_pptk');
	}

	public function index() {
		$data['jml_pegawai'] 	= $this->M_pegawai->total_rows();
		$data['jml_posisi'] 	= $this->M_posisi->total_rows();
		$data['jml_pptk'] 		= $this->M_pptk->total_rows();
		
		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		
		// $posisi 				= $this->M_posisi->select_all();
		$anggaran 				= $this->M_anggaran->select_all();
		$index = 0;
		foreach ($anggaran as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			// $pegawai_by_posisi = $this->M_pegawai->select_by_posisi($value->id);

			// $data_posisi[$index]['value'] = $pegawai_by_posisi->jml;
			// $data_posisi[$index]['color'] = $color;
			// $data_posisi[$index]['highlight'] = $color;
			// $data_posisi[$index]['label'] = $value->nama;
			

			$data_posisi[$index]['value'] = $value->jml_anggaran;
			$data_posisi[$index]['color'] = $color;
			$data_posisi[$index]['highlight'] = $color;
			$data_posisi[$index]['label'] = $value->nama_bidang;
			
			$index++;
		}
		
		
		// $anggaran=array([0]=> { ["id"]=>"1", ["nama_bidang"]=>"Sekretariat", ["jml_anggaran"]=> "14500000000", ["realisasi"]=> "3500000000"}, 
		// 				[1]=> { ["id"]=>"2", ["nama_bidang"]=>"Bidang IPW", ["jml_anggaran"]=> "5250000000", ["realisasi"]=>"2450000000"}
		// 				);
		
		// // $kota 				= $this->M_kota->select_all();
		// $index = 0;
		// foreach ($anggaran as $value) {
		//     $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

		// 	$data_kota[$index]['value'] = $jml_anggaran;
		// 	$data_kota[$index]['color'] = $color;
		// 	$data_kota[$index]['highlight'] = $color;
		// 	$data_kota[$index]['label'] = $value->nama;
			
		// 	$index++;
		// }

		$data['data_posisi'] = json_encode($data_posisi);
		
		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data CRUD";
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */