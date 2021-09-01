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

			<div class="isi-barang" style="margin-bottom: 100px;">

				<b>INPUT PESANAN</b>
				<br><br /><br />

				<!-- <form action="<?php echo site_url('welcome/input_psn') ?>" method="post"> -->
					<input type="hidden" name="nama_barang">
					Kode Pesanan<br />
					<input type="text" name="id_pesanan" value="<?= $code ?>" readonly /><br /><br />
					Nama Barang<br />
					<select name="barang_id" style="width: 30%;" onchange="changeProduct(this)">
						<option value="0" selected disabled>pilih barang</option>
						<?php
						foreach ($stockAvailable as $key => $value) :
						?>
							<option value="<?= $value['id']  ?>"><?= $value['nama_barang'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					Nama Konsumen<br />
					<select name="konsumen_id" style="width: 30%;">
						<option value="0" selected disabled>pilih Konsumen</option>
						<?php
						foreach ($konsumen as $key => $value) :
						?>
							<option value="<?= $value['id']  ?>"><?= $value['nama'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					Jumlah<br />
					<input type="number" name="jml" style="width: 10%" required /><br /><br />
					Harga<br />
					<input type="number" name="harga" style="width: 10%" required/><br /><br />
					Satuan<br />
					<input type="text" name="satuan" style="width: 10%" required readonly/><br /><br />
					<button onclick="simpan()">simpan</button>
				<!-- </form> -->

			</div>
			<div style="margin: 10px;">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Satuan</th>
							<th>Option</th>
						</tr>
					</thead>
					<tbody id="result">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								<button onclick="simpanData()">proses</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>

		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>
	<script>
		let data = [];

		function changeProduct(data) {
			$.getJSON("<?= site_url('welcome/get_list_product_by_id') ?>?id=" + data.value, function(data) {
				$("[name='satuan']").val(data.satuan);
				$("[name='nama_barang']").val(data.nama_barang);
			});
		}

		function simpan() {
			const id_pesanan = $("[name='id_pesanan']").val();
			const barang_id = $("[name='barang_id']").val();
			const jml = $("[name='jml']").val();
			const harga = $("[name='harga']").val();
			const nama_barang = $("[name='nama_barang']").val();
			const satuan = $("[name='satuan']").val();
			const konsumen_id = $("[name='konsumen_id']").val();

			if(id_pesanan !== '' && jml !== '') {
				data.push({
					id_pesanan,
					barang_id,
					jml,
					harga,
					nama_barang,
					satuan,
					konsumen_id
				});
			}
			if (data.length > 0) {
				let htmlRender = '';
				for (let index = 0; index < data.length; index++) {
					const element = data[index];
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.jml}</td>`;
					htmlRender += `<td>${element.satuan}</td>`;
					htmlRender += `<td><button onclick="hapus(${index})">hapus</button></td>`;
					htmlRender += '</tr>';
				}
				$("#result").empty().html(htmlRender);
			}
		}

		function hapus(idx) {
			$(`#pm_${idx}`).remove();
			data.splice(idx, 1);
		}

		function simpanData()
		{
			if(data.length > 0) {
				$.ajax({
					dataType: 'json',
					url: "<?= site_url('welcome/create_penjualan') ?>",
					method: 'post',
					data: {
						data: data
					},
					success: function(data, textStatus, jqXHR) {
						if(data.valid) {
							alert(data.message);
						} else {
							alert(data.message);
						}
						window.location.reload();
					}
				});
			}
		}
	</script>

</body>

</html>