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

				<form action="<?php echo site_url('welcome/input_pmsk') ?>" method="post">
					Kode Pemasok<br />
					<input type="text" name="id_pemasok" /><br /><br />
					Nama Pemasok<br />
					<input type="text" name="nm_pemasok" style="width:40%;" /><br /><br />
					Alamat <br />
					<input type="text" name="almt" style="width:70%;" /><br /><br />
					Email<br />
					<input type="text" name="email" style="width: 40%" /><br /><br />
					No Telepon<br />
					<input type="text" name="no_telp" /><br /><br />
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