<!DOCTYPE html>
<html>

<head>
    <title>Export</title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }
    </style>

    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=data_retur_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Penjualan</h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode retur</th>
                <th>Kode Penjualan</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Nama Konsumen</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Tanggal</th>
                <th>deskripsi</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $key => $value) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['kode_retur'] ?></td>
                    <td><?= $value['kode_penjualan'] ?></td>
                    <td><?= $value['nama_barang'] ?></td>
                    <td><?= $value['kode_barang'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['qty'] ?></td>
                    <td><?= $value['harga'] ?></td>
                    <td><?= $value['tanggal'] ?></td>
                    <td><?= $value['deskripsi'] ?></td>
                    <td>
                        <a href="<?php echo site_url('welcome/form_edit_retur/' . $value['id']) ?>" style="color: #8B0000; font-size: 14px;">Edit</a> ||
                        <a href="<?php echo site_url('welcome/delete_retur/' . $value['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000; font-size: 14px;">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>