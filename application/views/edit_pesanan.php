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

				<b>INPUT PEMASOK</b>
				<br><br /><br />

				<?php if ($dataEdit2) {
					$id = $dataEdit2->id;
				} else {
					$id_penjualan = "";
					$id_barang = "";
					$nama_barang = "";
					$stok_barang = "";
					$jumlah = "";
				} ?>

				<form action="<?php echo site_url('welcome/update_pesanan/' . $id) ?>" method="post">
					Kode Pesanan<br />
					<input type="text" name="id_pesanan" value="<?= $dataEdit2->kode_penjualan ?>" readonly /><br /><br />
					Nama Barang<br />
					<select name="barang_id" style="width: 30%;">
						<option value="0" selected disabled>pilih barang</option>
						<?php
						foreach ($stockAvailable as $key => $value) :
							$checkStock = $value['id'] == $dataEdit2->id_barang ? 'selected' : '';
						?>
							<option value="<?= $value['id']  ?>" <?= $checkStock ?>><?= $value['nama_barang'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					Nama Konsumen<br />
					<select name="konsumen_id" style="width: 30%;">
						<option value="0" selected disabled>pilih Konsumen</option>
						<?php
						foreach ($konsumen as $key => $value) :
							$checkKonsumen = $value['id'] == $dataEdit2->id_konsumen ? 'selected' : '';
						?>
							<option value="<?= $value['id']  ?>" <?= $checkKonsumen ?>><?= $value['nama'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					Jumlah<br />
					<input type="number" name="jml" style="width: 10%" value="<?= $dataEdit2->qty ?>" required /><br /><br />
					<input type="submit" name="simpan" value="Simpan" style="height:30px; width:20%;" />
				</form>

			</div>

		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>

</body>

</html>