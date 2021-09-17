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
		<div class="bag-menu">
			<div class="input-barang">
				<div class="input-barang-1">
					<form method="post" action="<?php echo site_url('welcome/pencarian_penerima') ?>">
						<input type="text" name="isi" style="width: 30%; padding-left: 1%;" placeholder="cari berdasarkan kode pembelian" />
						<input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />
					</form>
				</div>
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Total Barang</th>
							<th>Total Qty Pembelian</th>
							<th>Total Qty Diterima</th>
							<th>tanggal</th>
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
								<td><?= $value->kode_pembelian ?></td>
								<td><?= $value->total_barang ?></td>
								<td><?= $value->total_qty_order ?></td>
								<td><?= $value->total_qty_in ?></td>
								<td><?= $value->tanggal ?></td>
								<td>
									<?php
									if ($this->session->userdata('status') == 'gudang' || $this->session->userdata('status') == 'Staff Admin Gudang') :
									?>
										<a href="<?php echo site_url('welcome/input_penerima/' . $value->kode_pembelian) ?>" style="color: #8B0000; font-size: 14px;">Input</a>
									<?php endif; ?> ||
									<a href="#" style="color: #8B0000; font-size: 14px;" onclick="detail('<?= $value->kode_pembelian ?>')">Detail</a>
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
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Qty Beli</th>
								<th>Qty Diterima</th>
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

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		function detail(id) {
			$.getJSON("<?= site_url('welcome/get_list_penerima') ?>?kode=" + id, function(data) {
				let htmlRender = '';
				for (let index = 0; index < data.length; index++) {
					const element = data[index];
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.kode_barang}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.qty}</td>`;
					htmlRender += `<td>${element.sisa_qty}</td>`;
					htmlRender += '</tr>';
				}
				$("#result").empty().html(htmlRender);
				modal.style.display = "block";
			});
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