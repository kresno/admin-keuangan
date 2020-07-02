<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Npd extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
        $this->load->model('M_Npd');
        $this->load->model('M_pptk');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
        $data['dataNpd'] 	= $this->M_Npd->select_all();
        $data['dataPptk'] = $this->M_pptk->select_all();

		$data['page'] 		= "Npd";
		$data['judul'] 		= "Data Npd";
		$data['deskripsi'] 	= "Manage Data Npd";

		$data['modal_tambah_Npd'] = show_my_modal('modals/modal_tambah_Npd', 'tambah-Npd', $data);

		$this->template->views('Npd/home', $data);
	}

	public function tampil() {
		$data['dataNpd'] = $this->M_Npd->select_all();
		$this->load->view('Npd/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('Npd', 'Npd', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_Npd->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Npd Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Npd Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataNpd'] 	= $this->M_Npd->select_by_id($id);

		echo show_my_modal('modals/modal_update_Npd', 'update-Npd', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('Npd', 'Npd', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_Npd->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Npd Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Npd Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_Npd->delete($id);
		
		if ($result > 0) {
			echo show_succ_msg('Data Npd Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Npd Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['Npd'] = $this->M_Npd->select_by_id($id);
		$data['jumlahNpd'] = $this->M_Npd->total_rows();
		$data['dataNpd'] = $this->M_Npd->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_Npd', 'detail-Npd', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);
    
		// include_once './assets/phpexcel/Classes/PHPExcel.php';
		// $objPHPExcel = new PHPExcel();

		// $data = $this->M_Npd->select_all();

		// $objPHPExcel = new PHPExcel(); 
		// $objPHPExcel->setActiveSheetIndex(0); 

		// $objPHPExcel->getActiveSheet()->SetCellValue('A1', "ID"); 
		// $objPHPExcel->getActiveSheet()->SetCellValue('B1', "Nama Npd");

		// $rowCount = 2;
		// foreach($data as $value){
		//     $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $value->id); 
		//     $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $value->nama); 
		//     $rowCount++; 
		// } 

		// $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
		// $objWriter->save('./assets/excel/Data Npd.xlsx'); 

		$this->load->helper('download');
		force_download('./assets/excel/Data NPD.xlsx', NULL);
	}

	public function import() {
		$this->form_validation->set_rules('excel', 'File', 'trim|required');

		if ($_FILES['excel']['name'] == '') {
			$this->session->set_flashdata('msg', 'File harus diisi');
		} else {
			$config['upload_path'] = './assets/excel/';
			$config['allowed_types'] = 'xls|xlsx';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
			}
			else{
				$data = $this->upload->data();
				
				error_reporting(E_ALL);
				date_default_timezone_set('Asia/Jakarta');

				include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';

				$inputFileName = './assets/excel/' .$data['file_name'];
				$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

				$index = 0;
				foreach ($sheetData as $key => $value) {
					if ($key != 1) {
						$check = $this->M_Npd->check_nama($value['B']);

						if ($check != 1) {
							$resultData[$index]['nama'] = ucwords($value['B']);
						}
					}
					$index++;
				}

				unlink('./assets/excel/' .$data['file_name']);

				if (count($resultData) != 0) {
					$result = $this->M_Npd->insert_batch($resultData);
					if ($result > 0) {
						$this->session->set_flashdata('msg', show_succ_msg('Data Npd Berhasil diimport ke database'));
						redirect('Npd');
					}
				} else {
					$this->session->set_flashdata('msg', show_msg('Data Npd Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
					redirect('Npd');
				}

			}
		}
	}
}

/* End of file Npd.php */
/* Location: ./application/controllers/Npd.php */