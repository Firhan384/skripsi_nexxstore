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

				<b>INPUT KONSUMEN</b>
				<br><br /><br />

				<?php if ($list) {
					$id = $list->id;
                    $kode_konsumen = $list->kode_konsumen;
					$nama_konsumen = $list->nama;
					$alamat = $list->alamat;
					$email = $list->email;
					$no_telp = $list->no_tlp;
				} else {
					$id = "";
					$nama_konsumen = "";
					$alamat = "";
					$email = "";
					$no_telp = "";
				} ?>

				<form action="<?php echo site_url('welcome/update_konsumen/' . $id) ?>" method="post">
					Kode Konsumen<br />
					<input type="text" name="kode_pemasok" value="<?php echo $kode_konsumen ?>" readonly/><br /><br />
					Nama Konsumen<br />
					<input type="text" name="nm_pemasok" value="<?php echo $nama_konsumen ?>" style="width:40%;" required/><br /><br />
					Alamat <br />
					<input type="text" name="almt" value="<?php echo $alamat ?>" style="width:70%;" required/><br /><br />
					Email<br />
					<input type="text" name="email" value="<?php echo $email ?>" style="width: 40%" /required><br /><br />
					No Telepon<br />
					<input type="text" name="no_telp" value="<?php echo $no_telp ?>" required/><br /><br />
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