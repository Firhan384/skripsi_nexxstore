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
                    <form method="post" action="<?php echo site_url('welcome/pencarian_konsumen') ?>">
                        <input type="text" name="isi" style="width: 30%; padding-left: 1%;" />
                        <input type="submit" name="cari" value="Cari" style="width:15%; height:25px; padding-left:0px;" />
                        <a href="<?php echo site_url('welcome/input_konsumen') ?>" style='margin-left: 5%;'>Input Konsumen</a> || <a href="<?php echo site_url('welcome/print_konsumen') ?>">Print Konsumen</a> || <a href="<?php echo site_url('welcome/export_excel_konsumen') ?>">Export Excel</a>
                    </form>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Konsumen</th>
                            <th>Nama Konsumen</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($hasil as $key => $r) :
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $r['kode_konsumen'] ?></td>
                                <td><?php echo $r['nama'] ?></td>
                                <td><?php echo $r['alamat'] ?></td>
                                <td><?php echo $r['email'] ?></td>
                                <td><?php echo $r['no_tlp'] ?></td>
                                <td>
                                    <a href="<?php echo site_url('welcome/form_edit_konsumen/' . $r['id']) ?>" style="color: #8B0000; font-size: 14px;">Edit</a> ||
                                    <a href="<?php echo site_url('welcome/delete_konsumen/' . $r['id']) ?>" onclick="return confirm('Yakin ingin menghapus data ?')" style="color: #8B0000; font-size: 14px;">Hapus</a>
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