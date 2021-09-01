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

				<?php if ($dataEdit1) {
					$id_pemasok = $dataEdit1->id_pemasok;
					$nama_pemasok = $dataEdit1->nama_pemasok;
					$alamat = $dataEdit1->alamat;
					$email = $dataEdit1->email;
					$no_telp = $dataEdit1->no_telp;
				} else {
					$id_pemasok = "";
					$nama_pemasok = "";
					$alamat = "";
					$email = "";
					$no_telp = "";
				} ?>

				<form action="<?php echo site_url('welcome/update_pmsk/' . $id_pemasok) ?>" method="post">
					Kode Pemasok<br />
					<input type="text" name="id_pemasok" value="<?php echo $id_pemasok ?>" /><br /><br />
					Nama Pemasok<br />
					<input type="text" name="nm_pemasok" value="<?php echo $nama_pemasok ?>" style="width:40%;" /><br /><br />
					Alamat <br />
					<input type="text" name="almt" value="<?php echo $alamat ?>" style="width:70%;" /><br /><br />
					Email<br />
					<input type="text" name="email" value="<?php echo $email ?>" style="width: 40%" /><br /><br />
					No Telepon<br />
					<input type="text" name="no_telp" value="<?php echo $no_telp ?>" /><br /><br />
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