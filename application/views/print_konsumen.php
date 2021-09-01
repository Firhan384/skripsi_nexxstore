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
                <td>No</td>
                <td>Kode Konsumen</td>
                <td>Nama Konsumen</td>
                <td>Alamat</td>
                <td>Email</td>
                <td>No Telepon</td>
            </tr>

            <?php
            $no = 1;
            foreach ($hasil as $r) { ?>
                <tr style="font-size:16px;">
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['kode_konsumen'] ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['alamat'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['no_tlp'] ?></td>


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