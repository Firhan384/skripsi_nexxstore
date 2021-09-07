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
			<div class="isi-barang" style="margin-bottom: 120px;">
				<b>INPUT PEMBELIAN</b>
				<br><br /><br />
				<!-- <form action="<?php echo site_url('welcome/create_pembelian') ?>" method="post"> -->
				<select name="type" onchange="pilih(this)">
					<option selected disabled>pilih kondisi barang</option>
					<option value="new">Baru</option>
					<option value="old">Sudah ada</option>
				</select><br /><br />
				<div class="old_product" style="display: none;">
					<input type="hidden" name="supplier_id_old">
					<input type="hidden" name="barang_id_old">
					<input type="hidden" name="name_barang_old">
					Kode Pembelian<br />
					<input type="text" name="id_pesanan_old" require /><br /><br />
					Nama Barang<br />
					<select name="nm_barang_old" style="width: 30%;" onchange="changeBarang(this)">
						<option value="0" selected disabled>pilih barang</option>
						<?php
						foreach ($barang as $key => $value) :
						?>
							<option value="<?= $value['kode_barang']  ?>" data-id="<?= $value['id'] ?>" data-supplier="<?= $value['pemasok_id'] ?>" data-product="<?= $value['nama_barang'] ?>"><?= $value['nama_barang'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					Kode Barang <br />
					<input type="text" name="kode_barang_old" style="width:50%;" required readonly/><br /><br />
					Harga<br />
					<input type="number" name="harga_old" style="width: 20%" min="0" required /><br /><br />
					Jumlah<br />
					<input type="number" name="qty_old" style="width: 10%" min="0" required /><br /><br />
					Satuan<br />
					<select name="satuan_old" style="width: 10%">
						<option value="#" selected disabled>pilih satuan barang</option>
						<option value="pcs">Pcs</option>
						<option value="bundle">Bundle</option>
					</select><br /><br />
					<button onclick="simpan('old')">simpan</button>
				</div>
				<div class="new_product" style="display: none;">
					Kode Pembelian<br />
					<input type="text" name="id_pesanan" require /><br /><br />
					Kode Barang <br />
					<input type="text" name="kode_barang" style="width:50%;" required /><br /><br />
					Nama Barang <br />
					<input type="text" name="nm_barang" style="width:50%;" required /><br /><br />
					Harga<br />
					<input type="number" name="harga" style="width: 20%" min="0" required /><br /><br />
					Jumlah<br />
					<input type="number" name="qty" style="width: 10%" min="0" required /><br /><br />
					Satuan<br />
					<select name="satuan" style="width: 10%">
						<option value="#" selected disabled>pilih satuan barang</option>
						<option value="pcs">Pcs</option>
						<option value="bundle">Bundle</option>
					</select><br /><br />
					Nama Supplier<br />
					<select name="pemasok_id" style="width: 30%;">
						<option value="0" selected disabled>pilih Supplier</option>
						<?php
						foreach ($hasil as $key => $value) :
						?>
							<option value="<?= $value['id_pemasok']  ?>"><?= $value['nama_pemasok'] ?></option>
						<?php
						endforeach;
						?>
					</select><br /><br />
					<button onclick="simpan('new')">simpan</button>
				</div>
				<!-- </form> -->
			</div>
			<div style="margin: 10px;">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Kode Barang</th>
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
							<td colspan="8">
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
		let data = [], saveData = {};

		function pilih(x) {
			if(x.value == 'new') {
				$(".new_product").show();
				$(".old_product").hide();
			} else {
				$(".new_product").hide();
				$(".old_product").show();
			}
		}

		function changeBarang(p) {
			const name_product = p.selectedOptions[0].getAttribute('data-product');
			const supplier_id = p.selectedOptions[0].getAttribute('data-supplier');
			const barang_id = p.selectedOptions[0].getAttribute('data-id'); 
			$("[name='kode_barang_old']").val(p.value);
			$("[name='barang_id_old']").val(barang_id);
			$("[name='pemasok_id_old']").val(supplier_id);
			$("[name='name_barang_old']").val(name_product);
		}

		function simpan(type) {
			saveData = {};
			if (type == 'old') {
				const id_pesanan = $("[name='id_pesanan_old']").val();
				const nm_barang = $("[name='nm_barang_old']").val();
				const harga = $("[name='harga_old']").val();
				const qty = $("[name='qty_old']").val();
				const kode_barang = $("[name='kode_barang_old']").val();
				const satuan = $("[name='satuan_old']").val();
				const pemasok_id = $("[name='pemasok_id_old']").val();
				const barang_id = $("[name='barang_id_old']").val();
				const name_product = $("[name='name_barang_old']").val();

				saveData.barang_id = barang_id;
				saveData.id_pesanan = id_pesanan;
				saveData.nm_barang = name_product;
				saveData.harga = harga;
				saveData.qty = qty;
				saveData.kode_barang = kode_barang;
				saveData.pemasok_id = pemasok_id;
				saveData.satuan = satuan;
				saveData.typeProduct = 'old';
			} else {
				const id_pesanan = $("[name='id_pesanan']").val();
				const nm_barang = $("[name='nm_barang']").val();
				const harga = $("[name='harga']").val();
				const qty = $("[name='qty']").val();
				const kode_barang = $("[name='kode_barang']").val();
				const satuan = $("[name='satuan']").val();
				const pemasok_id = $("[name='pemasok_id']").val();

				saveData.id_pesanan = id_pesanan;
				saveData.nm_barang = nm_barang;
				saveData.harga = harga;
				saveData.qty = qty;
				saveData.kode_barang = kode_barang;
				saveData.pemasok_id = pemasok_id;
				saveData.satuan = satuan;
				saveData.typeProduct = 'new';
			}

			data.push(saveData);

			if (data.length > 0) {
				let htmlRender = '';
				for (let index = 0; index < data.length; index++) {
					const element = data[index];
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.id_pesanan}</td>`;
					htmlRender += `<td>${element.kode_barang}</td>`;
					htmlRender += `<td>${element.nm_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.qty}</td>`;
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

		function simpanData() {
			if (data.length > 0) {
				$.ajax({
					url: "<?= site_url('welcome/create_pembelian') ?>",
					method: 'post',
					dataType: 'json',
					data: {
						data: data
					},
					success: function(data, textStatus, jqXHR) {
						if (data.valid) {
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