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
    header("Content-Disposition: attachment; filename=data_konsumen_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Konsumen</h1>
    </center>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Konsumen</th>
                <th>Nama Konsumen</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $key => $r) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $r['kode_konsumen'] ?></td>
                    <td><?php echo $r['nama'] ?></td>
                    <td><?php echo $r['alamat'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['no_tlp'] ?></td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>