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
			<?php $status = $this->session->userdata('status'); ?>
			<?php echo $status ?>
		</div>

	</div>

	<div class="section">

		<?php
		$this->load->view('layout/navbar.php');
		?>


		<?php
		if (!empty($stock_warn) && ($this->session->userdata('status') === 'Manager' || $this->session->userdata('status') === 'Staff Finance' || $this->session->userdata('status') === 'Direktur')) :
		?>
			<div class="alert">
				<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
				Stock warning!!
				<?php
				foreach ($stock_warn as $key => $value) :
				?>
					<li><?= $value->nama_barang ?> stock barang <?= $value->stok_barang ?> <?= $value->satuan ?></li>

				<?php
				endforeach;
				?>
			</div>
		<?php
		endif;
		?>

		<div class="bag-menu">


			WELCOME TO NEXXSTORE

		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>

</body>

</html>