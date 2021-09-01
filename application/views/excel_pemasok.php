<!DOCTYPE html>
<html>

<head>
    <title>Export Pemasok</title>
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
    header("Content-Disposition: attachment; filename=data_pemasok_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Pemasok</h1>
    </center>

    <table border="1">
        <tr>
            <th>No</th>
            <td>Kode Pemasok</td>
            <td>Nama Pemasok</td>
            <td>Alamat</td>
            <td>Email</td>
            <td>No Telepon</td>
            <td>Tanggal</td>
        </tr>
        <?php
        $no = 1;
        foreach ($list as $key => $value) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $value->id_pemasok ?></td>
                <td><?php echo $value->nama_pemasok ?></td>
                <td><?php echo $value->alamat ?></td>
                <td><?php echo $value->email ?></td>
                <td><?php echo $value->no_telp ?></td>
                <td><?php echo $value->tanggal ?></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
</body>

</html>