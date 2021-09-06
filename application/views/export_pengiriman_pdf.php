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
        <h1>Surat Jalan : <?= $list->kode_pengiriman ?></h1>
        <h5>Nama Konsumen : <?= $konsumen->nama ?></h5>
        <h5>Alamat : <?= $konsumen->alamat ?></h5>
        <h5>No Telepon : <?= $konsumen->no_tlp ?></h5>
        <h5>Kode Penjualan : <?= $po[0]->kode_penjualan ?></h5>
        <h5>Tanggal Pengiriman : <?= $list->tanggal ?></h5>
    </center>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>total harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $subTotal = 0;
            foreach ($po as $key => $value) :
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $value->kode_penjualan; ?></td>
                    <td><?= $value->nama_barang; ?></td>
                    <td><?= $value->qty; ?></td>
                    <td><?= $value->harga; ?></td>
                    <td><?= ($value->harga * $value->qty); ?></td>
                </tr>
            <?php
                $no++;
                $subTotal += ($value->harga * $value->qty);
            endforeach;
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Sub Total</td>
                <td><?= $subTotal ?></td>
            </tr>
        </tfoot>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>