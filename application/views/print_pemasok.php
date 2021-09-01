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
                    	
                    	<tr style="font-size:16px; font-weight:bold;">
                        	<td width="7%;">No</td>
                        	<td width="15%;">Kode Pemasok</td>
                            <td width="20%;">Nama Pemasok</td>
                            <td width="18%;">Alamat</td>
                            <td width="22%;">Email</td>
                            <td width="20%;">No Telepon</td>
                            <td>Option</td>
                        </tr>

                        <?php
						$no = 1; 
						foreach($hasil as $r) { ?>	
						<tr style="font-size:16px;">
							<td><?php echo $no++ ?></td>
							<td><?php echo $r['id_pemasok'] ?></td>
							<td><?php echo $r['nama_pemasok'] ?></td>
							<td><?php echo $r['alamat'] ?></td>
							<td><?php echo $r['email'] ?></td>
							<td><?php echo $r['no_telp'] ?></td>
				
							
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