<!DOCTYPE html>
<html>

<head>
    <title>Export Pembelian</title>
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
    header("Content-Disposition: attachment; filename=data_pembelian_" . time() . ".xls");
    ?>

    <center>
        <h1>Export Pembelian</h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Jumlah barang</th>
                <th>Total Qty</th>
                <th>Supplier</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($list as $key => $value) :
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $value->no_po; ?></td>
                    <td><?= $value->count_barang; ?></td>
                    <td><?= $value->total_qty; ?></td>
                    <td><?= $value->nama_pemasok; ?></td>
                    <td><?= $value->tanggal; ?></td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>