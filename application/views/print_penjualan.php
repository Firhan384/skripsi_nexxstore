<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Nexx Store Inventory</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">


</head>

<body>

	<div class="header">

		<br><br>

		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Pembelian</th>
					<th>Jumlah barang</th>
					<th>Total Qty</th>
					<th>Konsumen</th>
					<th>Total Harga</th>
					<th>Tanggal</th>
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
						<td><?= $value->nama; ?></td>
						<td><?= $value->total_harga; ?></td>
						<td><?= $value->tanggal; ?></td>
					</tr>
				<?php
					$no++;
				endforeach;
				?>
			</tbody>
		</table>

		<script type="text/javascript">
			window.print();
		</script>
	</div>
	</div>
	</div>
	</div>


</body>

</html>