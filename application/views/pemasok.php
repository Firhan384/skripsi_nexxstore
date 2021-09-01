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


		<div class="bag-menu-cari">
			<div class="input-barang-1">
				<form method="post" action="<?php echo site_url('welcome/export_excel_pemasok') ?>">

					<input type="submit" name="cari" value="Export Excel" style="width:15%; height:25px; padding-left:0px;" />
				</form>
			</div>
		</div>

		<div class="bag-menu">
			<div class="input-barang">
				<div class="input-barang-1">
					<form method="post" action="<?php echo site_url('welcome/pencarian_pmsk') ?>">
						<input type="text" name="isi" style="width: 30%; padding-left: 1%;" />
						<input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />
						<a href="<?php echo site_url('welcome/input_pemasok') ?>" style='margin-left: 10%;'>Input Pemasok</a> || <a href="<?php echo site_url('welcome/print_pemasok') ?>">Print Pemasok</a>
					</form>
				</div>

				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pemasok</th>
							<th>Nama Pemasok</th>
							<th>Alamat</th>
							<th>Email</th>
							<th>No Telepon</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($hasil as $r) { ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $r['id_pemasok'] ?></td>
								<td><?php echo $r['nama_pemasok'] ?></td>
								<td><?php echo $r['alamat'] ?></td>
								<td><?php echo $r['email'] ?></td>
								<td><?php echo $r['no_telp'] ?></td>
								<td>
									<a href="<?php echo site_url('welcome/form_edit_pmsk/' . $r['id_pemasok']) ?>" style="color: #8B0000; font-size: 14px;">Edit</a> ||
									<a href="<?php echo site_url('welcome/delete_pmsk/' . $r['id_pemasok']) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000; font-size: 14px;">Hapus</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>
</body>
</html>