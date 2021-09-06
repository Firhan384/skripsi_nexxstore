<!DOCTYPE html>
<html>

<head>
    <title>Export Pengiriman</title>
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
    header("Content-Disposition: attachment; filename=data_pengiriman_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Pengiriman</h1>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Pengiriman</th>
            <th>Kode Penjualan</th>
            <th>No Plat</th>
            <th>Nama Driver</th>
            <th>tanggal</th>
        </tr>
        <?php
        $no = 1;
        foreach ($list as $key => $value) :
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $value['kode_pengiriman'] ?></td>
                <td><?= $value['kode_penjualan'] ?></td>
                <td><?= $value['no_polisi'] ?></td>
                <td><?= $value['nama_driver'] ?></td>
                <td><?= $value['tanggal'] ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>

</html>