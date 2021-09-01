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

				<table cellspacing="0px;">
                    	<tr style="font-size:18px; font-weight:bold;">
                        	<td width="7%;">No</td>
                        	<td width="20%;">Kode Barang</td>
                            <td width="40%;">Nama Barang</td>
                            <td width="10%;">Stok</td>
                            <td width="10%;">Satuan</td>
                            <td>Option</td>
                        </tr>

                        <?php
						$no = 1; 
						foreach($hasil as $r) { ?>	
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $r['id_barang'] ?></td>
							<td><?php echo $r['nama_barang'] ?></td>
							<td><?php echo $r['stok_barang'] ?></td>
							<td><?php echo $r['satuan'] ?></td>
				
							
						</tr>
						
						<?php } ?>

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