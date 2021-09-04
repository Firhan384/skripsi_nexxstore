<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Nexx Store Inventory</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">


</head>

<body>

	<div class="header">

		<div class="header-center">
			NEXX STORE INVENTORY
		</div>

		<div class="header-right">
			<?php $this->session->userdata('logged_in') ?>
			<?php $namaPeng = $this->session->userdata('nama'); ?>
			<?php echo $namaPeng ?>
		</div>

	</div>

	<div class="section">

		<?php
		$this->load->view('layout/navbar.php');
		?>


		<div class="bag-menu">

			<div class="isi-barang">

				<b>INPUT BARANG</b>
				<br><br /><br />

				<?php if ($dataEdit) {
					$id_barang = $dataEdit->id;
					$kode_barang = $dataEdit->kode_barang;
					$nama_barang = $dataEdit->nama_barang;
					$stok_barang = $dataEdit->stok_barang;
					$satuan = $dataEdit->satuan;
				} else {
					$id_barang = "";
					$nama_barang = "";
					$stok_barang = "";
					$satuan = "";
				} ?>

				<form action="<?php echo site_url('welcome/update_brg/' . $id_barang) ?>" method="post">
					Kode Barang<br />
					<input type="text" name="id_brg" value="<?php echo $kode_barang ?>" required /><br /><br />
					Nama Barang<br />
					<input type="text" name="nm_brg" value="<?php echo $nama_barang ?>" style="width:40%;" required/><br /><br />
					Stok <br />
					<input type="number" name="stok_brg" value="<?php echo $stok_barang ?>" style="width:10%;" /required><br /><br />
					Satuan<br />
					<input type="text" name="satuan_brg" value="<?php echo $satuan ?>" required/><br /><br />
					Harga<br />
					<input type="number" name="harga" value="<?php echo $dataEdit->harga ?>" required/><br /><br />
					<select name="pemasok_id" style="width: 30%;">
						<option value="0" disabled>pilih supllier</option>
						<?php
						foreach ($supplier as $key => $value) :
							$checkSelected = $value['id_pemasok'] == $dataEdit->pemasok_id ? 'selected' : '';
						?>
							<option value="<?= $value['id_pemasok']  ?>" <?= $checkSelected ?>><?= $value['nama_pemasok'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					<input type="submit" name="simpan" value="Simpan" style="height:30px; width:10%;" />
				</form>

			</div>

		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>

</body>

</html>