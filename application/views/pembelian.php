<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nexx Store Inventory</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
</head>

<body>

    <div class="header">

        <div class="header-center">
            NEXX STORE INVENTORY
        </div>

        <div class="header-right">
            <?php $this->session->userdata('logged_in') ?>
            <?php $namaPeng = $this->session->userdata('nama'); ?>
            <?php echo $namaPeng ?>
        </div>

    </div>

    <div class="section">

        <?php
        $this->load->view('layout/navbar.php');
        ?>


        <div class="bag-menu-cari">
            <div class="input-barang-1">
                <form method="post" action="<?php echo site_url('welcome/export_excel_pembelian') ?>">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" name="start_date" style="width: 30%; padding-left: 1%;" required /><br />
                    <label for="start_date">Tanggal Akhir</label>
                    <input type="date" name="end_date" style="width: 30%; padding-left: 1%;" required /><br />
                    <input type="submit" name="cari" value="Export Excel" style="width:15%; height:25px; padding-left:0px;" />
                </form>
            </div>
        </div>

        <div class="bag-menu">

            <div class="input-barang">
                <div class="input-barang-1">
                    <form method="post" action="<?php echo site_url('welcome/pencarian_pembelian') ?>">
                        <input type="text" name="isi" style="width: 30%; padding-left: 1%;" placeholder="cari berdasarkan no po" />
                        <input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />


                        <a href="<?php echo site_url('welcome/input_pembelian') ?>" style='margin-left: 10%;'>Input Pembelian</a> || <a href="<?php echo site_url('welcome/print_pesanan') ?>">Print Pembelian</a>


                    </form>

                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pembelian</th>
                            <th>Jumlah barang</th>
                            <th>Total Qty</th>
                            <th>Supplier</th>
                            <th>Tanggal</th>
                            <th>Option</th>
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
                                <td>
                                    <a href="<?php echo site_url('welcome/form_edit_pembelian/' . $value->no_po) ?>" style="color: #8B0000; font-size: 14px;">Edit</a> ||
                                    <a href="<?php echo site_url('welcome/delete_pmsk/' . $value->no_po) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000; font-size: 14px;">Hapus</a> || 
                                    <a href="<?php echo site_url('welcome/export_pembelian_pdf/' . $value->no_po) ?>" style="color: #8B0000; font-size: 14px;">Export</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>

            </div>


        </div>

    </div>

    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>

</body>

</html>