<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Nexx Store Inventory</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
				<form method="post" action="<?php echo site_url('welcome/export_excel_penjualan') ?>">
					<label for="start_date">Tanggal Mulai</label>
					<input type="date" name="start_date" style="width: 30%; padding-left: 1%;" required /><br />
					<label for="start_date">Tanggal Akhir</label>
					<input type="date" name="end_date" style="width: 30%; padding-left: 1%;" required /><br />
					<input type="submit" name="cari" value="Export Excel" style="width:15%; height:25px; padding-left:0px;" />
				</form>
			</div>
		</div>

		<div class="bag-menu">

			<div class="input-barang">
				<div class="input-barang-1">
					<form method="post" action="<?php echo site_url('welcome/pencarian_psn') ?>">
						<input type="text" name="isi" style="width: 30%; padding-left: 1%;" placeholder="cari berdasarkan kode pesanan" />
						<input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />


						<a href="<?php echo site_url('welcome/input_pesanan') ?>" style='margin-left: 10%;'>Input Pesanan</a> || <a href="<?php echo site_url('welcome/print_pesanan') ?>" target="_blank">Print Pesanan</a>


					</form>

				</div>

				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode pesanan</th>
							<th>Jumlah barang</th>
							<th>Total Qty</th>
							<th>Total Harga</th>
							<th>Konsumen</th>
							<th>Tanggal</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($list as $key => $value) :
						?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value->kode_penjualan; ?></td>
								<td><?= $value->total_barang; ?></td>
								<td><?= $value->total_qty; ?></td>
								<td><?= $value->total_harga; ?></td>
								<td><?= $value->nama; ?></td>
								<td><?= $value->tanggal; ?></td>
								<td class="option">
									<a href="<?php echo site_url('welcome/form_edit_psn/' . $value->kode_penjualan) ?>" style="color: #8B0000; font-size: 14px;">Edit</a> ||
									<a href="<?php echo site_url('welcome/delete_psn/' . $value->kode_penjualan) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000; font-size: 14px;">Hapus</a> ||
									<a href="#" onclick="detail('<?= $value->kode_penjualan ?>')" style="color: #8B0000; font-size: 14px;">Detail</a> ||
									<a href="<?php echo site_url('welcome/export_penjualan_pdf/' . $value->kode_penjualan) ?>" style="color: #8B0000; font-size: 14px;" target="__blank">Export</a>
								</td>
							</tr>
						<?php
							$no++;
						endforeach;
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>Detail Penjualan</h2>
			</div>
			<div class="modal-body">
			<div style="margin: 10px;">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pesanan</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Satuan</th>
						</tr>
					</thead>
					<tbody id="result">
					</tbody>
				</table>
			</div>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>


	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>
	<script>
		var modal = document.getElementById("myModal");
		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		function detail(kode) {
			$.getJSON("<?= site_url('welcome/get_list_penjualan') ?>?kode=" + kode, function(data) {
				let htmlRender = '';
				for (let index = 0; index < data.length; index++) {
					const element = data[index];
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.kode_penjualan}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.qty}</td>`;
					htmlRender += `<td>${element.satuan}</td>`;
					htmlRender += '</tr>';
				}
				$("#result").empty().html(htmlRender);
				modal.style.display = "block";
			});
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>

</body>

</html>