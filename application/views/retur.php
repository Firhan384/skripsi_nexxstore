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

        <div class="bag-menu">
            <div class="input-barang">
                <div class="input-barang-1">
                    <form method="post" action="<?php echo site_url('welcome/pencarian_retur') ?>">
                        <input type="text" name="isi" style="width: 30%; padding-left: 1%;" placeholder="cari berdasarkan kode retur" />
                        <input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />
                        <a href="<?php echo site_url('welcome/input_retur') ?>" style='margin-left: 5%;'>Input retur</a> || <a href="<?php echo site_url('welcome/print_retur') ?>">Print retur</a>
                    </form>
                </div>

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
                            <th>Tanggal</th>
                            <th>deskripsi</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($list as $key => $value):
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_retur'] ?></td>
                                <td><?= $value['kode_penjualan'] ?></td>
                                <td><?= $value['nama_barang'] ?></td>
                                <td><?= $value['kode_barang'] ?></td>
                                <td><?= $value['nama'] ?></td>
                                <td><?= $value['qty'] ?></td>
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
            </div>
        </div>
    </div>

    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>

</body>

</html