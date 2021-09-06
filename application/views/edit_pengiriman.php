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

            <div class="isi-barang">

                <b>UPDATE PENGIRIMAN</b>
                <br><br /><br />

                <form action="<?php echo site_url('welcome/update_pengiriman') ?>" method="post">
                    Kode Pengiriman<br />
                    <input type="text" name="kode_pengiriman" value="<?= $list->kode_pengiriman ?>" required/><br /><br />
                    Kode Penjualan<br />
                    <select name="kode_penjualan">
                        <option disabled>pilih kode penjualan</option>
                        <?php
                            foreach ($penjualan as $key => $value):
                                $selected = $value->kode_penjualan == $list->kode_penjualan ? 'selected' : '';
                        ?>
                            <option value="<?= $value->kode_penjualan ?>" <?= $selected ?>><?= $value->kode_penjualan ?> </option>
                        <?php
                            endforeach;
                        ?>
                    </select><br /><br />
                    Nomor Plat <br />
                    <input type="text" name="no_polisi" style="width:40%;" value="<?= $list->no_polisi ?>" required/><br /><br />
                    Nama Driver<br />
                    <input type="text" name="nama_driver" style="width: 40%" value="<?= $list->nama_driver ?>" required/><br /><br />
                    Harga<br />
                    <input type="text" name="harga" value="<?= $list->harga ?>" required/><br /><br />
                    <input type="submit" name="simpan" value="Simpan" style="height:30px; width:10%;" />
                </form>

            </div>

        </div>

    </div>

    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>

</body>

</html>