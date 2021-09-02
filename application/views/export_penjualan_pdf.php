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

    <center>
        <h1>Export Penjualan</h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Konsumen</th>
                <th>Total Harga</th>
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
                    <td><?= $value->kode_penjualan; ?></td>
                    <td><?= $value->nama_barang; ?></td>
                    <td><?= $value->qty; ?></td>
                    <td><?= $value->harga; ?></td>
                    <td><?= $value->nama; ?></td>
                    <td><?= $value->total_harga; ?></td>
                    <td><?= $value->tanggal; ?></td>
                </tr>
            <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>