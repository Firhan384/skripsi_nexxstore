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


		<div class="bag-menu" style="background: #ffff;">

			<div class="profile-kiri">

				<img src="https://nexxstore1.000webhostapp.com//upload/logo.jpg">

			</div>

			<div class="profile-kanan">

				<img src="https://nexxstore1.000webhostapp.com//upload/keterangan.png">

			</div>


		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>

</body>

</html>