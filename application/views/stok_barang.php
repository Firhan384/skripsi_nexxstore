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

			<a href="#" class="dropdown-toogle" data-toogle="dropdown">
				<i class="fa fa-bell-o"></i>
				<span class="label label-warning"><?php echo ('stok_barang'); ?></span>
			</a>

			|

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
		if (!empty($stock_warn) && ($this->session->userdata('status') === 'admin' || $this->session->userdata('status') === 'manager')) :
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

			<div class="input-barang">
				<div class="input-barang-1">
					<form method="post" action="<?php echo site_url('welcome/pencarian_brg') ?>">
						<input type="text" name="isi" style="width: 30%; padding-left: 1%;" />
						<input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />
						<?php
							if($this->session->userdata('status') === 'gudang' || $this->session->userdata('status') === 'Staff Admin Gudang'):
						?>
						<a href="<?php echo site_url('welcome/input_barang') ?>" style='margin-left: 10%;'>Input Barang</a>
						<?php
							endif;
						?>
						<?php
							if($this->session->userdata('status') === 'Staff Penjualan' || $this->session->userdata('status') === 'Manager' || $this->session->userdata('status') === 'Direktur'):
						?>
						|| <a href="<?php echo site_url('welcome/print_barang') ?>" target="_blank">Print Barang</a>
						|| <a href="<?php echo site_url('welcome/export_excel_stok') ?>" target="_blank">Export Excel</a>
						<?php
							endif;
						?>

					</form>

				</div>

				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Stok</th>
							<th>Satuan</th>
							<th>Supplier</th>
							<th>Expired</th>
							<th>Harga</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($hasil as $r) { ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $r['kode_barang'] ?></td>
								<td><?php echo $r['nama_barang'] ?></td>
								<td><?php echo $r['stok_barang'] ?></td>
								<td><?php echo $r['satuan'] ?></td>
								<td><?php echo $r['nama_pemasok'] ?></td>
								<td><?php echo $r['expired'] ?></td>
								<td><?php echo $r['harga'] ?></td>
								<td>
									<a href="<?php echo site_url('welcome/form_edit_brg/' . $r['id']) ?>" style="color: #8B0000;">Edit</a> ||
									<a href="<?php echo site_url('welcome/delete_brg/' . $r['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000;">Hapus</a>
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