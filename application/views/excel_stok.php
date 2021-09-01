<!DOCTYPE html>
<html>

<head>
    <title>Export Stok</title>
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
    header("Content-Disposition: attachment; filename=data_stok_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Stok</h1>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <td>Id Barang</td>
            <td>Id User</td>
            <td>Nama Barang</td>
            <td>Stok Barang</td>
            <td>Satuan</td>
            <td>Supplier</td>
        </tr>
        <?php
        $no = 1;
        foreach ($list as $key => $value) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $value->id_barang ?></td>
                <td><?php echo $value->id_user ?></td>
                <td><?php echo $value->nama_barang ?></td>
                <td><?php echo $value->stok_barang ?></td>
                <td><?php echo $value->satuan ?></td>
                <td><?php echo $value->nama_pemasok ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>

</html>