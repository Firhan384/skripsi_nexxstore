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
        <h1>Purchase Order <?= $list[0]->kode_pembelian ?></h1>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Qty</th>
                <th>harga</th>
                <th>total harga</th>
                <th>Supplier</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $subTotal = 0;
            foreach ($list as $key => $value) :
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $value->kode_pembelian; ?></td>
                    <td><?= $value->nama_barang; ?></td>
                    <td><?= $value->kode_barang; ?></td>
                    <td><?= $value->qty; ?></td>
                    <td><?= $value->harga; ?></td>
                    <td><?= $value->total_harga; ?></td>
                    <td><?= $value->nama_pemasok; ?></td>
                    <td><?= $value->tanggal; ?></td>
                </tr>
            <?php
                $subTotal += $value->total_harga;
                $no++;
            endforeach;
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">Sub Total</td>
                <td><?= $subTotal ?></td>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>