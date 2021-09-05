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

				<b>INPUT PESANAN</b><br>
				<button id="myBtn">TAMBAH BARANG</button>
				<br><br /><br />

				<!-- <form action="<?php echo site_url('welcome/input_psn') ?>" method="post"> -->
				<input type="hidden" name="nama_barang">
				<input type="hidden" name="id_edit">
				Kode Pesanan<br />
				<input type="text" name="id_pesanan" required/><br /><br />
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
				<input type="number" name="harga" style="width: 10%" required /><br /><br />
				Satuan<br />
				<input type="text" name="satuan" style="width: 10%" required readonly /><br /><br />
				<button onclick="simpan()">simpan</button>
				<!-- </form> -->

			</div>
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
							<th>Option</th>
						</tr>
					</thead>
					<tbody id="result">
					</tbody>
					<tfoot>
						<tr>
							<td colspan="7">
								<button onclick="simpanData()">proses</button>
							</td>
						</tr>
					</tfoot>
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
				<h2>Tambah Pesanan</h2>
			</div>
			<div class="modal-body">
				<input type="hidden" name="nama_barang_new">
				Kode Pesanan<br />
				<input type="text" name="id_pesanan_new" required/><br /><br />
				Nama Barang<br />
				<select name="barang_new_id" style="width: 30%;" onchange="changeProduct(this)">
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
				<select name="konsumen_new_id" style="width: 30%;">
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
				<input type="number" name="jml_new" style="width: 10%" required /><br /><br />
				Harga<br />
				<input type="number" name="harga_new" style="width: 10%" required /><br /><br />
				Satuan<br />
				<input type="text" name="satuan_new" style="width: 10%" required readonly /><br /><br />
			</div>
			<div class="modal-footer">
				<button onclick="simpanNew()">simpan</button>
			</div>
		</div>

	</div>

	<div class="footer">
		2021 &copy; Nexx Store Inventory
	</div>
	<script>
		let status = '';
		let oldData = JSON.stringify(<?= json_encode($data) ?>);
		let newData = [],
			oldDataSaved = [];
		let newArrayData;
		let parsingDataOld = JSON.parse(oldData);

		if (parsingDataOld.length > 0) {
			let htmlRender = '';
			for (let index = 0; index < parsingDataOld.length; index++) {
				const element = parsingDataOld[index];
				htmlRender += `<tr id="pm_${index}">`;
				htmlRender += `<td>${index+1}</td>`;
				htmlRender += `<td>${element.kode_penjualan}</td>`;
				htmlRender += `<td>${element.nama_barang}</td>`;
				htmlRender += `<td>${element.harga}</td>`;
				htmlRender += `<td>${element.qty}</td>`;
				htmlRender += `<td>${element.satuan}</td>`;
				htmlRender += `<td><button onclick="hapus(${index})">hapus</button> || <button onclick="edit(${index})">edit</button></td>`;
				htmlRender += '</tr>';

				oldDataSaved.push({
					id: element.id,
					_id: index,
					id_pesanan: element.kode_penjualan,
					barang_id: element.id_barang,
					jml: element.qty,
					harga: element.harga,
					nama_barang: element.nama_barang,
					satuan: element.satuan,
					konsumen_id: element.konsumen_id,
					status: 'old'
				})
			}
			newArrayData = oldDataSaved.concat(newData);
			$("#result").empty().html(htmlRender);
		}

		function edit(id) {
			status = 'update';
			const myData = newArrayData[id];
			$("[name='id_pesanan']").val(myData.id_pesanan);
			$("[name='barang_id']").val(myData.barang_id);
			$("[name='jml']").val(myData.jml);
			$("[name='harga']").val(myData.harga);
			$("[name='nama_barang']").val(myData.nama_barang);
			$("[name='satuan']").val(myData.satuan);
			$("[name='konsumen_id']").val(myData.konsumen_id);
			$("[name='id_edit']").val(id)
		}

		function changeProduct(data) {
			$.getJSON("<?= site_url('welcome/get_list_product_by_id') ?>?id=" + data.value, function(data) {
				if (status === 'update') {
					$("[name='satuan']").val(data.satuan);
					$("[name='nama_barang']").val(data.nama_barang);
				} else {
					$("[name='satuan_new']").val(data.satuan);
					$("[name='nama_barang_new']").val(data.nama_barang);
				}
			});
		}

		function simpanNew() {
			const barang_id = $("[name='barang_new_id']").val();
			const jml = $("[name='jml_new']").val();
			const harga = $("[name='harga_new']").val();
			const nama_barang = $("[name='nama_barang_new']").val();
			const satuan = $("[name='satuan_new']").val();
			const konsumen_id = $("[name='konsumen_new_id']").val();
			const kode_penjualan = $("[name='id_pesanan_new']").val();
			
			newArrayData.push({
				_id: (newArrayData.length+1),
				id_pesanan: kode_penjualan,
				barang_id: barang_id,
				jml: jml,
				harga: harga,
				nama_barang: nama_barang,
				satuan: satuan,
				konsumen_id: konsumen_id,
				status: 'new'
			});

			let htmlRender = '';
			for (let index = 0; index < newArrayData.length; index++) {
				const element = newArrayData[index];
				if(element.status == 'old' || element.status == 'new') {
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.id_pesanan}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.jml}</td>`;
					htmlRender += `<td>${element.satuan}</td>`;
					htmlRender += `<td><button onclick="hapus(${index})">hapus</button> || <button onclick="edit(${index})">edit</button></td>`;
					htmlRender += '</tr>';
				}
			}
			$("#result").empty().html(htmlRender);
		}

		function simpan() {
			const id_pesanan = $("[name='id_pesanan']").val();
			const id_edit = $("[name='id_edit']").val();
			const barang_id = $("[name='barang_id']").val();
			const jml = $("[name='jml']").val();
			const harga = $("[name='harga']").val();
			const nama_barang = $("[name='nama_barang']").val();
			const satuan = $("[name='satuan']").val();
			const konsumen_id = $("[name='konsumen_id']").val();

			$(`#pm_${id_edit}`).each(function(index, element) {
				// kode pesanan
				$(this).find("td").eq(1).text(id_pesanan);
				// nama barang
				$(this).find("td").eq(2).text(nama_barang);
				// harga
				$(this).find("td").eq(3).text(harga);
				// jumlah
				$(this).find("td").eq(4).text(jml);
				// satuan
				$(this).find("td").eq(5).text(satuan);
			});

			newArrayData[id_edit].id_pesanan = id_pesanan;
			newArrayData[id_edit].barang_id = barang_id;
			newArrayData[id_edit].jml = jml;
			newArrayData[id_edit].harga = harga;
			newArrayData[id_edit].nama_barang = nama_barang;
			newArrayData[id_edit].satuan = satuan;
			newArrayData[id_edit].konsumen_id = konsumen_id;
		}

		function simpanData()
		{
			if(newArrayData.length > 0) {
				$.ajax({
					dataType: 'json',
					url: "<?= site_url('welcome/update_penjualan') ?>",
					method: 'post',
					data: {
						data: newArrayData
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

		function hapus(idx) {
			$(`#pm_${idx}`).remove();
			if(newArrayData[idx].status == 'old') {
				newArrayData[idx].status = 'deleted';
			} else {
				newArrayData[idx].status = 'trash';
			}
			let htmlRender = '';
			for (let index = 0; index < newArrayData.length; index++) {
				const element = newArrayData[index];
				if(element.status == 'old' || element.status == 'new') {
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.id_pesanan}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.jml}</td>`;
					htmlRender += `<td>${element.satuan}</td>`;
					htmlRender += `<td><button onclick="hapus(${index})">hapus</button> || <button onclick="edit(${index})">edit</button></td>`;
					htmlRender += '</tr>';
				}
			}
			$("#result").empty().html(htmlRender);
		}

		// modal setup
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
			modal.style.display = "block";
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