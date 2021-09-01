<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Nexx Store Inventory</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">


</head>

<body>

	<div class="header">

		NEXX STORE INVENTORY

	</div>

	<div class="section">

		<div class="section-1">

			<div class="section-login">
				Masuk Dengan Akun Anda!
			</div>


			<form method="POST" action="<?php echo site_url('welcome/login') ?>">
				<input type="text" name="username" placeholder="Username"><br />
				<input type="password" name="password" placeholder="Password"><br /><br />
			<select name="status" style="width:25%; height: 25px; margin-left: 40%; ">
					<option selected disabled>pilih level</option>
					<option value="Staff Admin Gudang"> Staff Admin Gudang </option>
					<option value="Staff Finance">Staff Finance </option>	<option value="Direktur">Direktur</option>

<option value="Manager">Manager</option>

<option value="Staff Penjualan">Staff Penjualan</option>

				</select>
				<input type="submit" name="masuk" value="Masuk" style="padding:0px; width:20%; margin-left:42%;">
			</form>

			<br><br>
			<div style="text-align:center; font-size:20px; height:30px; color:#8B0000; font-weight:bold; font-style:italic;
            			 width:100%;">
				<?php echo $this->session->flashdata('error') ?>
				<?php echo $this->session->flashdata('gagal') ?>
			</div>

		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>

</body>

</html>