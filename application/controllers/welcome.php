<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function form_daftar()
	{
		$this->load->view('daftar');
	}

	public function hal_beranda()
	{
		$data['stock_warn'] = $this->model_dis->stock_warning()->result();
		$this->load->view('beranda', $data);
	}

	public function hal_profile()
	{
		$this->load->view('profile');
	}

	public function hal_stok()
	{
		$this->data['hasil'] = $this->model_dis->getListStok();
		$this->data['stock_warn'] = $this->model_dis->stock_warning()->result();
		$this->load->view('stok_barang', $this->data);
	}

	public function hal_retur()
	{
		$data['list'] = $this->model_dis->getListRetur();
		$data['stock_warn'] = $this->model_dis->stock_warning()->result();
		$this->load->view('retur', $data);
	}

	public function input_barang()
	{
		$data['supplier'] = $this->model_dis->getUser('pemasok');
		$this->load->view('input_barang', $data);
	}

	public function input_brg()
	{
		$id_brg = $_POST['id_brg'];
		$id_peng = $this->session->userdata('id_log');
		$nm_brg = $_POST['nm_brg'];
		$stok_brg = $_POST['stok_brg'];
		$satuan_brg = $_POST['satuan_brg'];
		$harga = $_POST['harga'];
		$data = array('kode_barang' => $id_brg, 'id_user' => $id_peng, 'nama_barang' =>
		$nm_brg, 'stok_barang' => $stok_brg, 'satuan' => $satuan_brg, 'tanggal' => date('Y-m-d h:i:s'), 'harga' => $harga, 'pemasok_id' => $_POST['pemasok_id']);
		$insert = $this->model_dis->tambah_user('stok_barang', $data);
		if ($insert > 0) {
			redirect('welcome/hal_stok');
		} else {
			echo 'Gagal Input';
		}
	}

	public function form_edit_retur($id)
	{
		$data['data'] = $this->model_dis->getReturById($id);
		$data['listPenjualan'] =  $this->model_dis->getListPenjualanBy();
		$this->load->view('edit_retur', $data);
	}

	public function form_edit_brg($id)
	{
		$data['dataEdit'] = $this->model_dis->dataEdit('stok_barang', $id);
		$data['supplier'] = $this->model_dis->getUser('pemasok');
		$this->load->view('edit_barang', $data);
	}

	public function update_brg($id)
	{
		$harga = $_POST['harga'];
		$id_peng = $this->session->userdata('id_log');
		$nm_brg = $_POST['nm_brg'];
		$stok_brg = $_POST['stok_brg'];
		$satuan_brg = $_POST['satuan_brg'];
		$data = array('harga' => $harga, 'id_user' => $id_peng, 'nama_barang' =>
		$nm_brg, 'stok_barang' => $stok_brg, 'satuan' => $satuan_brg, 'pemasok_id' => $_POST['pemasok_id']);
		$edit = $this->model_dis->editData('stok_barang', $data, $id);
		if ($edit > 0) {
			redirect('welcome/hal_stok');
		} else {
			echo 'Gagal Input';
		}
	}

	public function delete_brg($id)
	{
		$hapus = $this->model_dis->hapusData('stok_barang', $id);
		if ($hapus > 0) {
			redirect('welcome/hal_stok');
		} else {
			echo 'Gagal Disimpan';
		}
	}

	public function pencarian_brg()
	{
		$cari = $this->input->post('isi', true);
		$this->db->like('nama_barang', $cari);
		$this->data['hasil'] = $this->model_dis->getUser('stok_barang');
		$this->load->view('stok_barang', $this->data);
	}

	public function hal_pemasok()
	{
		$this->data['hasil'] = $this->model_dis->getUser('pemasok');
		$this->data['stock_warn'] = $this->model_dis->stock_warning()->result();
		$this->load->view('pemasok', $this->data);
	}

	public function input_pemasok()
	{
		$this->load->view('input_pemasok');
	}

	public function input_pmsk()
	{
		$id_pemasok = $_POST['id_pemasok'];
		$id_peng = $this->session->userdata('id_log');
		$nm_pemasok = $_POST['nm_pemasok'];
		$almt = $_POST['almt'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$data = array('id_pemasok' => $id_pemasok, 'id_user' => $id_peng, 'nama_pemasok' =>
		$nm_pemasok, 'alamat' => $almt, 'email' => $email, 'no_telp' => $no_telp);
		$insert = $this->model_dis->tambah_user('pemasok', $data);
		if ($insert > 0) {
			redirect('welcome/hal_pemasok');
		} else {
			echo 'Gagal Input';
		}
	}

	public function form_edit_pmsk($id)
	{
		$this->data['dataEdit1'] = $this->model_dis->dataEdit1('pemasok', $id);
		$this->load->view('edit_pemasok', $this->data);
	}

	public function form_edit_pembelian($id)
	{
		$data['hasil'] = $this->model_dis->getUser('pemasok');
		$data['data'] = $this->model_dis->getListPoByPo($id);
		$this->load->view('edit_pembelian', $data);
	}

	public function update_pmsk($id)
	{
		$id_pemasok = $_POST['id_pemasok'];
		$id_peng = $this->session->userdata('id_log');
		$nm_pemasok = $_POST['nm_pemasok'];
		$almt = $_POST['almt'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$data = array('id_pemasok' => $id_pemasok, 'id_user' => $id_peng, 'nama_pemasok' =>
		$nm_pemasok, 'alamat' => $almt, 'email' => $email, 'no_telp' => $no_telp);
		$edit = $this->model_dis->editData1('pemasok', $data, $id);
		if ($edit > 0) {
			redirect('welcome/hal_pemasok');
		} else {
			echo 'Gagal Input';
		}
	}

	public function update_konsumen($id)
	{
		$id_peng = $this->session->userdata('id_log');
		$nm_pemasok = $_POST['nm_pemasok'];
		$almt = $_POST['almt'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$data = array('user_id' => $id_peng, 'nama' =>
		$nm_pemasok, 'alamat' => $almt, 'email' => $email, 'no_tlp' => $no_telp);
		$edit = $this->model_dis->editData1('konsumen', $data, $id);
		if ($edit > 0) {
			redirect('welcome/hal_konsumen');
		} else {
			echo 'Gagal Input';
		}
	}

	public function delete_konsumen($id)
	{
		$hapus = $this->model_dis->hapusData1('konsumen', $id);
		if ($hapus > 0) {
			redirect('welcome/hal_konsumen');
		} else {
			echo 'Gagal Disimpan';
		}
	}

	public function delete_pmsk($id)
	{
		$hapus = $this->model_dis->hapusData1('pemasok', $id);
		if ($hapus > 0) {
			redirect('welcome/hal_pemasok');
		} else {
			echo 'Gagal Disimpan';
		}
	}

	public function pencarian_pmsk()
	{
		$cari = $this->input->post('isi', true);
		$this->db->like('nama_pemasok', $cari);
		$this->data['hasil'] = $this->model_dis->getUser('pemasok');
		$this->load->view('pemasok', $this->data);
	}

	public function pencarian_konsumen()
	{
		$cari = $this->input->post('isi', true);
		$this->db->like('nama', $cari);
		$this->data['hasil'] = $this->model_dis->getUser('konsumen');
		$this->load->view('konsumen', $this->data);
	}

	public function hal_penjualan()
	{
		$data['list'] = $this->model_dis->getListPenjualanNew();
		$data['stock_warn'] = $this->model_dis->stock_warning()->result();
		$this->load->view('penjualan', $data);
	}

	public function hal_pembelian()
	{
		$data['list'] = $this->model_dis->getListPo();
		$this->load->view('pembelian', $data);
	}

	public function hal_konsumen()
	{
		$data['hasil'] = $this->model_dis->getUser('konsumen');
		$this->load->view('konsumen', $data);
	}

	public function input_retur()
	{
		$data['listPenjualan'] =  $this->model_dis->getListPenjualanBy();
		$data['code'] =  $this->model_dis->getCodeRetur();
		$this->load->view('input_retur', $data);
	}

	public function input_konsumen()
	{
		$this->load->view('input_konsumen');
	}

	public function input_pesanan()
	{
		$data['stockAvailable'] =  $this->model_dis->stockAvailable()->result_array();
		$data['konsumen'] = $this->model_dis->getUser('konsumen');
		$this->load->view('input_pesanan', $data);
	}

	public function input_pembelian()
	{
		$data['hasil'] = $this->model_dis->getUser('pemasok');
		$data['code'] = $this->model_dis->getGenerateCodePo();
		$this->load->view('input_pembelian', $data);
	}

	public function create_konsumen()
	{
		$id_pemasok = $_POST['kode_konsumen'];
		$id_peng = $this->session->userdata('id_log');
		$nm_pemasok = $_POST['nm_pemasok'];
		$almt = $_POST['almt'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$data = array('kode_konsumen' => $id_pemasok, 'user_id' => $id_peng, 'nama' =>
		$nm_pemasok, 'alamat' => $almt, 'email' => $email, 'no_tlp' => $no_telp, 'tanggal' => date('Y-m-d h:i:s'));
		$insert = $this->model_dis->tambah_user('konsumen', $data);
		if ($insert > 0) {
			redirect('welcome/hal_konsumen');
		} else {
			echo 'Gagal Input';
		}
	}

	public function create_retur()
	{
		$id_peng = $this->session->userdata('id_log');
		$data = array('kode_retur' => $_POST['kode_retur'], 'user_id' => $id_peng, 'penjualan_id' =>
		$_POST['penjualan_id'], 'qty' => $_POST['jml'], 'deskripsi' => $_POST['deskripsi'], 'tanggal' => date('Y-m-d h:i:s'));
		$insert = $this->model_dis->tambah_user('retur', $data);
		if ($insert > 0) {
			redirect('welcome/hal_retur');
		} else {
			echo 'Gagal Input';
		}
	}

	public function update_retur($id)
	{
		$id_peng = $this->session->userdata('id_log');
		$data = array('kode_retur' => $_POST['kode_retur'], 'user_id' => $id_peng, 'penjualan_id' =>
		$_POST['penjualan_id'], 'qty' => $_POST['jml'], 'deskripsi' => $_POST['deskripsi'], 'tanggal' => date('Y-m-d h:i:s'));
		$edit = $this->model_dis->editData('retur', $data, $id);
		if ($edit > 0) {
			redirect('welcome/hal_retur');
		} else {
			echo 'Gagal Input';
		}
	}

	public function delete_retur($id)
	{
		$hapus = $this->model_dis->hapusData('retur', $id);
		if ($hapus > 0) {
			redirect('welcome/hal_retur');
		} else {
			echo 'Gagal Disimpan';
		}
	}

	public function input_psn()
	{
		$findProduct = $this->model_dis->getProductById($_POST['barang_id'])->row();
		if ($findProduct == NULL) {
			echo "product tidak ditemukan";
			exit(0);
		}

		if (intval($_POST['jml']) > $findProduct->stok_barang) {
			echo "stock qty tidak ada";
			exit(0);
		}

		$id_pesanan = $_POST['id_pesanan'];
		$id_peng = $this->session->userdata('id_log');
		$id_barang = $_POST['barang_id'];
		$jml = $_POST['jml'];
		$data = array('kode_penjualan' => $id_pesanan, 'id_user' => $id_peng, 'id_barang' =>
		$id_barang, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_konsumen' => $_POST['konsumen_id']);
		$insert = $this->model_dis->tambah_user('penjualan', $data);

		$edit = $this->model_dis->editData('stok_barang', [
			'stok_barang' => ($findProduct->stok_barang - intval($jml))
		], $findProduct->id);

		if ($insert > 0 && $edit > 0) {
			redirect('welcome/hal_penjualan');
		} else {
			echo 'Gagal Input';
		}
	}

	public function form_edit_psn($id)
	{
		$data['stockAvailable'] =  $this->model_dis->stockAvailable()->result_array();
		$data['konsumen'] = $this->model_dis->getUser('konsumen');
		$data['data'] = $this->model_dis->getEditPenjualanById($id)->result_array();
		$this->load->view('edit_pesanan', $data);
	}

	public function form_edit_konsumen($id)
	{
		$this->data['list'] = $this->model_dis->dataEdit2('konsumen', $id);
		$this->load->view('edit_konsumen', $this->data);
	}

	public function update_pesanan($id)
	{
		$id_peng = $this->session->userdata('id_log');
		$data = array('id_barang' => $_POST['barang_id'], 'id_konsumen' => $_POST['konsumen_id'], 'qty' => $_POST['jml'], 'id_user' => $id_peng);
		$edit = $this->model_dis->editData2('penjualan', $data, $id);
		if ($edit > 0) {
			redirect('welcome/hal_penjualan');
		} else {
			echo 'Gagal Input';
		}
	}

	public function delete_psn($id)
	{
		$hapus = $this->model_dis->hapusData2('penjualan', $id);
		if ($hapus > 0) {
			redirect('welcome/hal_penjualan');
		} else {
			echo 'Gagal Disimpan';
		}
	}

	public function pencarian_psn()
	{
		$cari = $this->input->post('isi', true);
		$data['list'] = $this->model_dis->getListPenjualanCari($cari);
		$this->load->view('penjualan', $data);
	}

	public function pencarian_pembelian()
	{
		$cari = $this->input->post('isi', true);
		$data['list'] = $this->model_dis->getListPo($cari);
		$this->load->view('pembelian', $data);
	}

	public function pencarian_retur()
	{
		$cari = $this->input->post('isi', true);
		$data['list'] = $this->model_dis->getListRetur($cari);
		$this->load->view('retur', $data);
	}

	public function insert()
	{
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$hp = $_POST['hp'];
		$id = $_POST['id'];
		$pass = $_POST['password'];
		$status = $_POST['status'];
		$data = array('nama_user' => $nama, 'email' => $email, 'no_hp' =>
		$hp, 'username' => $id, 'password' => $pass, 'status' => $status);
		$insert = $this->model_dis->tambah_user('user', $data);
		if ($insert > 0) {
			$this->session->set_flashdata('sukses', 'Pendaftaran sukses, silahkan masuk...');
			redirect('welcome/form_daftar');
		} else {
			echo 'Gagal Daftar';
		}
	}

	public function login()
	{
		$namaPeng = $this->session->userdata('nama');
		$user = $this->input->post('username', true);
		$kode = $this->input->post('password', true);
		$status = $this->input->post('status', true);
		$cek = $this->model_dis->proses_login($user, $kode, $status);
		$hasil = $cek->num_rows();
		if ($hasil > 0) {
			$log = $this->db->get_where('user', array('username' => $user, 'password' => $kode, 'status' => $status))->row();
			$ses = array(
				'logged_in' => true,
				'nama' => $log->nama_user,
				'id_log' => $log->id_user,
				'status' => $log->status
			);
			$this->session->set_userdata($ses);
			redirect('welcome/hal_beranda');
		} elseif ($user == '' && $kode == '' && $status == '') {
			$this->session->set_flashdata('error', 'User Id dan Password tidak boleh kosong!!!');
			redirect('welcome/index');
		} else {
			$this->session->set_flashdata('gagal', 'User Id dan Password yang dimasukan salah!!!');
			redirect('welcome/index');
		}
	}

	function update_pembelian()
	{
		$data = $_POST['data'];
		for ($i = 0; $i < count($data); $i++) {
			// set data
			$kode_penjualan = $_POST['data'][$i]['id_pembelian'];
			$id_peng = $this->session->userdata('id_log');
			$jml = $_POST['data'][$i]['jml'];

			if ($_POST['data'][$i]['status'] == 'new') {
				// simpan produk
				$id_produk = $this->model_dis->insert_id([
					'kode_barang' =>  $_POST['data'][$i]['kode_barang'],
					'nama_barang' =>  $_POST['data'][$i]['nama_barang'],
					'stok_barang' =>  $_POST['data'][$i]['jml'],
					'satuan' =>  $_POST['data'][$i]['satuan'],
					'harga' =>  $_POST['data'][$i]['harga'],
					'pemasok_id' =>  $_POST['data'][$i]['pemasok_id'],
					'id_user' =>  $id_peng,
					'tanggal' =>  date('Y-m-d h:i:s'),
				], 'stok_barang');

				// simpan pembelian
				$datas = array('kode_pembelian' => $kode_penjualan, 'id_barang' =>
				$id_produk, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_user' => $id_peng);
				$this->model_dis->tambah_user('pembelian', $datas);
			} else if ($_POST['data'][$i]['status'] == 'old') {
				// update pembelian
				$datas = array('kode_pembelian' => $kode_penjualan, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_barang' => $_POST['data'][$i]['barang_id'], 'id_user' => $id_peng);

				$this->model_dis->editData('pembelian', $datas, $_POST['data'][$i]['id']);

				// update produk
				$productData = $this->model_dis->getProductById($_POST['data'][$i]['barang_id'])->row();
				if ($productData == NULL) {
					echo json_encode([
						'valid' => false,
						'message' => "product tidak ada"
					]);
					exit(0);
				}

				$this->model_dis->editData('stok_barang', [
					'nama_barang' => $_POST['data'][$i]['nama_barang'],
					'stok_barang' => $_POST['data'][$i]['jml'],
					'satuan' => $_POST['data'][$i]['satuan'],
					'harga' => $_POST['data'][$i]['harga'],
					'pemasok_id' => $_POST['data'][$i]['pemasok_id'],
					'id_user' => $id_peng,
					'kode_barang' =>  $_POST['data'][$i]['kode_barang'],
				], $productData->id);
			} else if ($_POST['data'][$i]['status'] == 'deleted') {
				$this->model_dis->hapusData('pembelian', $_POST['data'][$i]['id']);
				$this->model_dis->hapusData('stok_barang', $_POST['data'][$i]['barang_id']);
			}
		}
		echo json_encode([
			'valid' => true,
			'message' => "berhasil update pembelian"
		]);
	}
	function update_penjualan()
	{
		$data = $_POST['data'];

		for ($i = 0; $i < count($data); $i++) {
			$productData = $this->model_dis->getProductById($_POST['data'][$i]['barang_id'])->row();
			if ($productData == NULL) {
				echo json_encode([
					'valid' => false,
					'message' => "product tidak ada"
				]);
				exit(0);
			}

			if (intval($_POST['data'][$i]['jml']) > $productData->stok_barang) {
				echo json_encode([
					'valid' => false,
					'message' => "stock barang {$productData->nama_barang} || {$productData->kode_barang} tidak cukup"
				]);
				exit(0);
			}

			// set data
			$kode_penjualan = $_POST['data'][$i]['id_pesanan'];
			$id_peng = $this->session->userdata('id_log');
			$jml = $_POST['data'][$i]['jml'];

			if ($_POST['data'][$i]['status'] == 'new') {
				$datas = array('kode_penjualan' => $kode_penjualan, 'id_user' => $id_peng, 'id_barang' =>
				$productData->id, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_konsumen' => $_POST['data'][$i]['konsumen_id'], 'harga' => $_POST['data'][$i]['harga']);
				$this->model_dis->tambah_user('penjualan', $datas);

				// update
				$this->model_dis->editData('stok_barang', [
					'stok_barang' => ($productData->stok_barang - intval($jml))
				], $productData->id);
			} else if ($_POST['data'][$i]['status'] == 'old') {
				$findData = $this->model_dis->getById('penjualan', $_POST['data'][$i]['id'])->row();
				if ($findData->qty > intval($jml)) {
					$qty = $productData->stok_barang + ($findData->qty - intval($jml));
				} else {
					$qty = $productData->stok_barang - ($findData->qty - intval($jml));
				}

				$datas = array('kode_penjualan' => $kode_penjualan, 'id_user' => $id_peng, 'id_barang' =>
				$productData->id, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_konsumen' => $_POST['data'][$i]['konsumen_id'], 'harga' => $_POST['data'][$i]['harga']);

				// update
				$this->model_dis->editData('penjualan', $datas, $_POST['data'][$i]['id']);
				// update
				$this->model_dis->editData('stok_barang', [
					'stok_barang' => $qty
				], $productData->id);
			} else if ($_POST['data'][$i]['status'] == 'deleted') {
				
				$findData = $this->model_dis->getById('penjualan', $_POST['data'][$i]['id'])->row();
				$this->model_dis->editData('stok_barang', [
					'stok_barang' => ($findData->qty + $productData->stok_barang)
				], $productData->id);

				$this->model_dis->hapusData('penjualan', $_POST['data'][$i]['id']);
			}
		}

		echo json_encode([
			'valid' => true,
			'message' => "berhasil update penjualan"
		]);
	}

	function create_penjualan()
	{
		$data = $_POST['data'];
		for ($i = 0; $i < count($data); $i++) {
			$productData = $this->model_dis->getProductById($_POST['data'][$i]['barang_id'])->row();
			if ($productData == NULL) {
				echo json_encode([
					'valid' => false,
					'message' => "product tidak ada"
				]);
				exit(0);
			}

			if (intval($_POST['data'][$i]['jml']) > $productData->stok_barang) {
				echo json_encode([
					'valid' => false,
					'message' => "stock barang {$productData->nama_barang} || {$productData->kode_barang} tidak cukup"
				]);
				exit(0);
			}

			$id_pesanan = $_POST['data'][$i]['id_pesanan'];
			$id_peng = $this->session->userdata('id_log');
			$jml = $_POST['data'][$i]['jml'];
			$datas = array('kode_penjualan' => $id_pesanan, 'id_user' => $id_peng, 'id_barang' =>
			$productData->id, 'qty' => $jml, 'tanggal' => date('Y-m-d h:i:s'), 'id_konsumen' => $_POST['data'][$i]['konsumen_id'], 'harga' => $_POST['data'][$i]['harga']);
			$this->model_dis->tambah_user('penjualan', $datas);

			$this->model_dis->editData('stok_barang', [
				'stok_barang' => ($productData->stok_barang - intval($jml))
			], $productData->id);
		}

		echo json_encode([
			'valid' => true,
			'message' => "berhasil membuat penjualan"
		]);
	}

	function create_pembelian()
	{
		$data = $_POST['data'];

		for ($i = 0; $i < count($data); $i++) {
			// insert product
			$productId = $this->model_dis->insert_id([
				'kode_barang' => $_POST['data'][$i]['kode_barang'],
				'id_user' => $this->session->userdata('id_log'),
				'nama_barang' => $_POST['data'][$i]['nm_barang'],
				'stok_barang' => $_POST['data'][$i]['qty'],
				'satuan' => $_POST['data'][$i]['satuan'],
				'harga' => $_POST['data'][$i]['harga'],
				'pemasok_id' => $_POST['data'][$i]['pemasok_id'],
				'tanggal' => date('Y-m-d h:i:s')
			], 'stok_barang');

			// insert ke pembelian
			$this->model_dis->tambah_user('pembelian', [
				'id_barang' => $productId,
				'qty' => $_POST['data'][$i]['qty'],
				'kode_pembelian' => $_POST['data'][$i]['id_pesanan'],
				'id_user' => $this->session->userdata('id_log'),
				'tanggal' => date('Y-m-d h:i:s'),
			]);
		}

		echo json_encode([
			'valid' => true,
			'message' => 'berhasil menambahkan pembelian'
		]);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

	public function print_retur()
	{
		$data['list'] = $this->model_dis->getListRetur();
		$this->load->view('print_retur', $data);
	}

	public function print_pembelian()
	{
		$data['list'] = $this->model_dis->getListPo();
		$this->load->view('print_pembelian', $data);
	}

	public function print_pesanan()
	{
		$data['list'] = $this->model_dis->getListPenjualannPrint();
		$this->load->view('print_penjualan', $data);
	}

	public function print_pemasok()
	{
		$this->data['hasil'] = $this->model_dis->getUser('pemasok');
		$this->load->view('print_pemasok', $this->data);
	}

	public function print_konsumen()
	{
		$this->data['hasil'] = $this->model_dis->getUser('konsumen');
		$this->load->view('print_konsumen', $this->data);
	}

	public function print_barang()
	{
		$this->data['hasil'] = $this->model_dis->getUser('stok_barang');
		$this->load->view('print_barang', $this->data);
	}

	public function export_excel_penjualan()
	{
		$datas = $this->model_dis->export_pesanan($_POST['start_date'], $_POST['end_date']);
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('excel_pejualan_excel', $data);
		} else {
			echo "<script>alert('data penjualan kosong');</script>";
		}
	}

	public function export_excel_pembelian()
	{
		$datas = $this->model_dis->export_pembelian($_POST['start_date'], $_POST['end_date']);
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('excel_pembelian_excel', $data);
		} else {
			echo "<script>alert('data pembelian kosong');</script>";
		}
	}

	public function export_pembelian_pdf($d)
	{
		$datas = $this->model_dis->getListPembelianPrintById($d);
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('export_pembelian_pdf', $data);
		} else {
			echo "<script>alert('data pembelian kosong');</script>";
		}
	}

	public function export_penjualan_pdf($d)
	{
		$datas = $this->model_dis->getListPenjualannPrintById($d);
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('export_penjualan_pdf', $data);
		} else {
			echo "<script>alert('data penjualan kosong');</script>";
		}
	}

	public function export_excel_pemasok()
	{
		$datas = $this->model_dis->export_pemasok();
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('excel_pemasok', $data);
		} else {
			echo "<script>alert('data pemasok kosong');</script>";
		}
	}

	public function export_excel_stok()
	{
		$datas = $this->model_dis->export_stok();
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result();
			$this->load->view('excel_stok', $data);
		} else {
			echo "<script>alert('data stok kosong');</script>";
		}
	}

	public function export_excel_konsumen()
	{
		$datas = $this->model_dis->export_konsumen();
		if ($datas->num_rows() > 0) {
			$data['list'] = $datas->result_array();
			$this->load->view('excel_konsumen', $data);
		} else {
			echo "<script>alert('data konsumen kosong');</script>";
		}
	}

	function get_list_json_penjualan()
	{
		echo json_encode($this->model_dis->getPenjualanById($_GET['po'])->result());
	}

	function get_list_product_by_id()
	{
		echo json_encode($this->model_dis->getProductById($_GET['id'])->row());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */