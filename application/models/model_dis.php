<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_dis extends CI_Model
{

	public function tambah_user($table_name, $data)
	{
		$tambah = $this->db->insert($table_name, $data);
		return $data;
	}

	public function insert_id($data, $tbl)
	{
		//Insert Data Query
		$this->db->insert($tbl, $data);

		// Storing id into varialbe
		$id = $this->db->insert_id();
		return $id;
	}

	public function proses_login($user, $kode)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $kode);
		return $this->db->get('user');
	}

	public function getUser($table_name)
	{
		$get_user = $this->db->get($table_name);
		return $get_user->result_array();
	}

	public function editData($table_name, $data, $id)
	{
		$this->db->where('id', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit($table_name, $id)
	{
		$this->db->where('id', $id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editData1($table_name, $data, $id)
	{
		if ($table_name == 'konsumen') {
			$whereData = 'id';
		} else {
			$whereData = 'id_pemasok';
		}
		$this->db->where($whereData, $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit1($table_name, $id)
	{
		$this->db->where('id_pemasok', $id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function editData2($table_name, $data, $id)
	{
		$this->db->where('id', $id);
		$edit = $this->db->update($table_name, $data);
		return $edit;
	}

	public function dataEdit2($table_name, $id)
	{
		if ($table_name == 'konsumen') {
			$whereData = 'id';
		} else {
			$whereData = 'id';
		}
		$this->db->where($whereData, $id);
		$get_user = $this->db->get($table_name);
		return $get_user->row();
	}

	public function hapusData($table_name, $id)
	{
		$this->db->where('id', $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function hapusData1($table_name, $id)
	{
		if ($table_name == 'konsumen') {
			$whereData = 'id';
		} else {
			$whereData = 'id';
		}
		$this->db->where($whereData, $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function hapusData2($table_name, $id)
	{
		$this->db->where('kode_penjualan', $id);
		$hapus = $this->db->delete($table_name);
		return $hapus;
	}

	public function stock_warning()
	{
		$this->db->select("*");
		$this->db->from('stok_barang');
		$this->db->where('stok_barang <=', 24);
		return $this->db->get();
	}

	public function export_pembelian($start_date, $end_date)
	{
		$a = $start_date . ' 00:00:00';
		$b = $end_date . ' 23:59:59';

		return $this->db->query("SELECT 
		pembelian.kode_pembelian as no_po, pembelian.tanggal, SUM(pembelian.qty) as total_qty, COUNT(pembelian.id_barang) as count_barang,
		pemasok.nama_pemasok
		FROM `pembelian`
		LEFT JOIN stok_barang ON pembelian.id_barang = stok_barang.id
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok
		WHERE pembelian.tanggal >= '$a' AND penjualan.tanggal <= '$b'
		GROUP BY pembelian.kode_pembelian");
	}

	public function export_pesanan($start_date, $end_date)
	{
		$a = $start_date . ' 00:00:00';
		$b = $end_date . ' 23:59:59';

		return $this->db->query("SELECT 
		COUNT(penjualan.id_barang) as total_barang, SUM(penjualan.qty) AS total_qty, penjualan.kode_penjualan, penjualan.tanggal,
		konsumen.nama
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		WHERE penjualan.tanggal >= '$a' AND penjualan.tanggal <= '$b'
		GROUP BY penjualan.kode_penjualan");
	}

	public function export_konsumen()
	{
		$this->db->select("*");
		$this->db->from('konsumen');
		return $this->db->get();
	}

	public function export_pemasok()
	{
		$this->db->select("*");
		$this->db->from('pemasok');
		return $this->db->get();
	}
	public function export_stok()
	{
		return $this->db->query("SELECT 
		stok_barang.id, stok_barang.nama_barang, stok_barang.stok_barang, stok_barang.satuan, stok_barang.harga,
		pemasok.nama_pemasok
		FROM `stok_barang`
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok");
	}

	function getCodeBarang()
	{
		$count = $this->db->select('*')->from('stok_barang')->get()->num_rows();
		return 'SKU-' . uniqid() . sprintf('-%04s', ($count + 1));
	}

	function getCodeCustomer()
	{
		$count = $this->db->select('*')->from('konsumen')->get()->num_rows();
		return 'CSM-' . uniqid() . sprintf('-%04s', ($count + 1));
	}

	function getCodeRetur()
	{
		$count = $this->db->select('*')->from('retur')->get()->num_rows();
		return 'RTR-' . uniqid() . sprintf('-%04s', ($count + 1));
	}

	function getGenerateCodePo()
	{
		$maxData = $this->db->query("SELECT MAX(kode_pembelian) as kode_pembelian FROM pembelian")->result_array();
		if ($maxData[0]['kode_pembelian'] === NULL) {
			$po = "PO-000";
		} else {
			$po = $maxData[0]['kode_pembelian'];
		}
		$urutanPo = (int) substr($po, 3, 3);
		$urutanPo++;
		$kode = "PO-";
		$gabungKode = $kode . sprintf("%03s", $urutanPo);
		return $gabungKode;
	}

	function getGenerateCodeInv()
	{
		$maxData = $this->db->query("SELECT MAX(kode_penjualan) as kode_penjualan FROM penjualan")->result_array();
		if ($maxData[0]['kode_penjualan'] === NULL) {
			$po = "PS-000";
		} else {
			$po = $maxData[0]['kode_penjualan'];
		}
		$urutanPo = (int) substr($po, 3, 3);
		$urutanPo++;
		$kode = "PS-";
		$gabungKode = $kode . sprintf("%03s", $urutanPo);
		return $gabungKode;
	}

	function stockAvailable()
	{
		$this->db->select("*");
		$this->db->from('stok_barang');
		$this->db->where('stok_barang >', 0);
		return $this->db->get();
	}

	function getListRetur($cari = '')
	{
		$sql = "SELECT 
		retur.kode_retur, retur.id, retur.tanggal,retur.qty, retur.deskripsi,
		penjualan.kode_penjualan,
		stok_barang.nama_barang, stok_barang.kode_barang,
		konsumen.nama
		FROM `retur`
		LEFT JOIN penjualan ON retur.penjualan_id = penjualan.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id";

		if($cari !== '') {
			$sql .= " WHERE retur.kode_retur LIKE '%$cari%'";
		}

		return $this->db->query($sql)->result_array();
	}

	function getListStok()
	{
		return $this->db->query("SELECT 
		stok_barang.id, stok_barang.nama_barang, stok_barang.stok_barang, stok_barang.satuan, stok_barang.harga,
		pemasok.nama_pemasok, stok_barang.kode_barang
		FROM `stok_barang`
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok")->result_array();
	}

	function getListPo($cari = '')
	{
		$sql = "SELECT 
		pembelian.kode_pembelian as no_po, pembelian.tanggal, SUM(pembelian.qty) as total_qty, COUNT(pembelian.id_barang) as count_barang,
		pemasok.nama_pemasok
		FROM `pembelian`
		LEFT JOIN stok_barang ON pembelian.id_barang = stok_barang.id
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok";

		if($cari !== '') {
			$sql .= " WHERE pembelian.kode_pembelian LIKE '%$cari%'";
		}

		$sql .= " GROUP BY no_po";

		return $this->db->query($sql)->result();
	}

	function getListPoByPo($noPo)
	{
		return $this->db->query("SELECT 
		pembelian.kode_pembelian as no_po, pembelian.tanggal, pembelian.qty, pembelian.id_barang,
		pemasok.nama_pemasok
		FROM `pembelian`
		LEFT JOIN stok_barang ON pembelian.id_barang = stok_barang.id
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok
		WHERE pembelian.kode_pembelian = '$noPo'
		")->result();
	}

	function getPenjualanById($po)
	{
		return $this->db->query("
		SELECT
		penjualan.kode_penjualan, penjualan.id,
		stok_barang.nama_barang
		FROM `penjualan`
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		WHERE penjualan.kode_penjualan='$po'");
	}

	function getProductById($id) {
		$this->db->select("*");
		$this->db->from('stok_barang');
		$this->db->where('id', $id);
		return $this->db->get();
	}

	function getListPenjualanBy()
	{
		return $this->db->query("SELECT kode_penjualan, id_barang, id FROM penjualan GROUP BY kode_penjualan")->result();
	}

	function getListPenjualan()
	{
		return $this->db->query("SELECT 
	penjualan.id, penjualan.tanggal, penjualan.qty, stok_barang.nama_barang, penjualan.id_barang,
		pemasok.nama_pemasok, stok_barang.satuan as jumlah, stok_barang.kode_barang, penjualan.kode_penjualan
		FROM `penjualan`
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok")->result_array();
	}

	function getReturById($id)
	{
		return $this->db->query("
			SELECT 
			retur.id, retur.kode_retur, retur.penjualan_id, retur.qty, retur.deskripsi,
			stok_barang.nama_barang
			FROM `retur`
			LEFT JOIN penjualan ON retur.penjualan_id = penjualan.id
			LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
			WHERE retur.id={$id}
		")->row();
	}

	function getListPembelianPrintById($d)
	{
		return $this->db->query("SELECT 
		stok_barang.nama_barang, stok_barang.kode_barang,
		pemasok.nama_pemasok,
		pembelian.kode_pembelian, pembelian.qty, pembelian.tanggal
		FROM `pembelian`
		LEFT JOIN stok_barang ON pembelian.id_barang = stok_barang.id
		LEFT JOIN pemasok ON stok_barang.pemasok_id = pemasok.id_pemasok
		WHERE pembelian.kode_pembelian='$d'
		");
	}

	function getListPenjualannPrintById($d)
	{
		return $this->db->query("SELECT 
		penjualan.kode_penjualan, penjualan.tanggal, penjualan.qty, penjualan.harga,
		konsumen.nama,
        stok_barang.kode_barang, stok_barang.nama_barang
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		WHERE penjualan.kode_penjualan='$d'
		");
	}
	
	function getListPenjualannPrint()
	{
		return $this->db->query("SELECT 
		COUNT(penjualan.id_barang) as total_barang, SUM(penjualan.qty) AS total_qty, penjualan.kode_penjualan, penjualan.tanggal,
		konsumen.nama
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		GROUP BY penjualan.kode_penjualan")->result();
	}

	function getListPenjualannPrintByInv($kode)
	{
		return $this->db->query("SELECT 
		COUNT(penjualan.id_barang) as total_barang, SUM(penjualan.qty) AS total_qty, penjualan.kode_penjualan, penjualan.tanggal,
		konsumen.nama
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		WHERE penjualan.kode_penjualan='$kode'
		")->result();
	}

	function getListPenjualanNew()
	{
		return $this->db->query("SELECT 
		COUNT(penjualan.id_barang) as total_barang, SUM(penjualan.qty) AS total_qty, penjualan.kode_penjualan, penjualan.tanggal,
		konsumen.nama
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		GROUP BY penjualan.kode_penjualan")->result();
	}

	function getListPenjualanCari($cari)
	{
		return $this->db->query("SELECT 
		COUNT(penjualan.id_barang) as total_barang, SUM(penjualan.qty) AS total_qty, penjualan.kode_penjualan, penjualan.tanggal,
		konsumen.nama
		FROM `penjualan`
		LEFT JOIN konsumen ON penjualan.id_konsumen = konsumen.id
		LEFT JOIN stok_barang ON penjualan.id_barang = stok_barang.id
		WHERE penjualan.kode_penjualan LIKE '%$cari%'
		GROUP BY penjualan.kode_penjualan")->result();
	}
}
