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

				<form action="<?php echo site_url('welcome/input_brg') ?>" method="post">
					Kode Barang<br />
					<input type="text" name="id_brg" value="<?= $code ?>" readonly/><br /><br />
					Nama Barang<br />
					<input type="text" name="nm_brg" style="width:40%;" required/><br /><br />
					Stok <br />
					<input type="number" name="stok_brg" style="width:10%;" required/><br /><br />
					Satuan<br />
					<input type="text" name="satuan_brg" required/><br /><br />
					Harga<br />
					<input type="number" name="harga" required/><br /><br />
					Supplier<br />
					<select name="pemasok_id" style="width: 30%;">
						<option value="0" selected disabled>pilih supllier</option>
						<?php
                        foreach ($supplier as $key => $value) :
                        ?>
                        <option value="<?= $value['id_pemasok']  ?>"><?= $value['nama_pemasok'] ?></option>
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