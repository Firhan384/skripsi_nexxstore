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
			<div class="isi-barang" style="margin-bottom: 150px;">
				<input type="hidden" name="id_edit">
				<b>INPUT PEMBELIAN</b><br>
				<button id="myBtn">TAMBAH BARANG</button>
				<br><br /><br />
				<!-- <form action="<?php echo site_url('welcome/create_pembelian') ?>" method="post"> -->
				Kode Pembelian<br />
				<input type="text" name="id_pembelian" required /><br /><br />
				Kode Barang<br />
				<input type="text" name="kode_barang" required /><br /><br />
				Nama Barang <br />
				<input type="text" name="nm_barang" style="width:50%;" required /><br /><br />
				Harga<br />
				<input type="number" name="harga" style="width: 20%" min="0" required /><br /><br />
				Jumlah<br />
				<input type="number" name="qty" style="width: 10%" min="0" required /><br /><br />
				Satuan<br />
				<select name="satuan" style="width: 30%">
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
				<button onclick="simpan()">simpan</button>
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

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<div class="modal-header">
				<span class="close">&times;</span>
				<h2>Tambah Pesanan</h2>
			</div>
			<div class="modal-body">
				Kode Pembelian <br />
				<input type="text" name="id_pembelian_new" style="width:50%;" required /><br /><br />
				Kode Barang <br />
				<input type="text" name="kode_barang_new" style="width:50%;" required /><br /><br />
				Nama Barang <br />
				<input type="text" name="nm_barang_new" style="width:50%;" required /><br /><br />
				Harga<br />
				<input type="number" name="harga_new" style="width: 20%" min="0" required /><br /><br />
				Jumlah<br />
				<input type="number" name="qty_new" style="width: 10%" min="0" required /><br /><br />
				Satuan<br />
				<select name="satuan_new" style="width: 30%">
					<option value="#" selected disabled>pilih satuan barang</option>
					<option value="pcs">Pcs</option>
					<option value="bundle">Bundle</option>
				</select><br /><br />
				Nama Supplier<br />
				<select name="pemasok_id_new" style="width: 30%;">
					<option value="0" selected disabled>pilih Supplier</option>
					<?php
					foreach ($hasil as $key => $value) :
					?>
						<option value="<?= $value['id_pemasok']  ?>"><?= $value['nama_pemasok'] ?></option>
					<?php
					endforeach;
					?>
				</select><br /><br />
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
				htmlRender += `<td>${element.no_po}</td>`;
				htmlRender += `<td>${element.kode_barang}</td>`;
				htmlRender += `<td>${element.nama_barang}</td>`;
				htmlRender += `<td>${element.harga}</td>`;
				htmlRender += `<td>${element.qty}</td>`;
				htmlRender += `<td>${element.satuan}</td>`;
				htmlRender += `<td><button onclick="hapus(${index})">hapus</button> || <button onclick="edit(${index})">edit</button></td>`;
				htmlRender += '</tr>';

				oldDataSaved.push({
					id: element.id,
					_id: index,
					id_pembelian: element.no_po,
					barang_id: element.id_barang,
					kode_barang: element.kode_barang,
					jml: element.qty,
					harga: element.harga,
					nama_barang: element.nama_barang,
					satuan: element.satuan,
					pemasok_id: element.id_pemasok,
					status: 'old'
				});
			}
			newArrayData = oldDataSaved.concat(newData);
			$("#result").empty().html(htmlRender);
		}

		function edit(id) {
			status = 'update';
			const myData = newArrayData[id];
			$("[name='qty']").val(myData.jml);
			$("[name='harga']").val(myData.harga);
			$("[name='nm_barang']").val(myData.nama_barang);
			$("[name='satuan']").val(myData.satuan);
			$("[name='pemasok_id']").val(myData.pemasok_id);
			$("[name='id_edit']").val(id);
			$("[name='id_pembelian']").val(myData.id_pembelian);
			$("[name='kode_barang']").val(myData.kode_barang);
		}

		function simpanNew() {
			const jml = $("[name='qty_new']").val();
			const harga = $("[name='harga_new']").val();
			const nm_barang_new = $("[name='nm_barang_new']").val();
			const satuan = $("[name='satuan_new']").val();
			const pemasok_id_new = $("[name='pemasok_id_new']").val();
			const kode_penjualan = $("[name='id_pembelian_new']").val();
			const kode_barang_new = $("[name='kode_barang_new']").val();

			newArrayData.push({
				_id: (newArrayData.length + 1),
				id_pembelian: kode_penjualan,
				jml: jml,
				harga: harga,
				nama_barang: nm_barang_new,
				satuan: satuan,
				pemasok_id: pemasok_id_new,
				kode_barang: kode_barang_new,
				status: 'new'
			});

			let htmlRender = '';
			for (let index = 0; index < newArrayData.length; index++) {
				const element = newArrayData[index];
				if (element.status == 'new' || element.status == 'old') {
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.id_pembelian}</td>`;
					htmlRender += `<td>${element.kode_barang}</td>`;
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
			const id_edit = $("[name='id_edit']").val();
			const qty = $("[name='qty']").val();
			const harga = $("[name='harga']").val();
			const kode_barang = $("[name='kode_barang']").val();
			const nama_barang = $("[name='nm_barang']").val();
			const satuan = $("[name='satuan']").val();
			const pemasok_id = $("[name='pemasok_id']").val();
			const id_pembelian = $("[name='id_pembelian']").val();

			$(`#pm_${id_edit}`).each(function(index, element) {
				// kode pmebleina
				$(this).find("td").eq(1).text(id_pembelian);
				// kode barang
				$(this).find("td").eq(2).text(kode_barang);
				// nama barang
				$(this).find("td").eq(3).text(nama_barang);
				// harga
				$(this).find("td").eq(4).text(harga);
				// qty
				$(this).find("td").eq(5).text(qty);
				// satuan
				$(this).find("td").eq(6).text(satuan);
			});
			newArrayData[id_edit].jml = qty;
			newArrayData[id_edit].kode_barang = kode_barang;
			newArrayData[id_edit].harga = harga;
			newArrayData[id_edit].nama_barang = nama_barang;
			newArrayData[id_edit].satuan = satuan;
			newArrayData[id_edit].pemasok_id = pemasok_id;
			newArrayData[id_edit].id_pembelian = id_pembelian;
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
				if (element.status == 'new' || element.status == 'old') {
					htmlRender += `<tr id="pm_${index}">`;
					htmlRender += `<td>${index+1}</td>`;
					htmlRender += `<td>${element.id_pembelian}</td>`;
					htmlRender += `<td>${element.kode_barang}</td>`;
					htmlRender += `<td>${element.nama_barang}</td>`;
					htmlRender += `<td>${element.harga}</td>`;
					htmlRender += `<td>${element.jml}</td>`;
					htmlRender += `<td>${element.satuan}</td>`;
					htmlRender += `<td><button onclick="hapus(${index})">hapus</button> || <button onclick="edit(${index})">edit</button></td>`;
					htmlRender += '</tr>';
				}
			}
			$("#result").empty().html(htmlRender);
			console.log(newArrayData);
		}

		function simpanData() {
			if (newArrayData.length > 0) {
				$.ajax({
					url: "<?= site_url('welcome/update_pembelian') ?>",
					dataType: 'json',
					method: 'post',
					data: {
						data: newArrayData
					},
					success: function(data, textStatus, jqXHR) {
						if (data.valid) {
							alert(data.message);
							window.location.reload();
						}
					}
				});
			}
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