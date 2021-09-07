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
                <b>INPUT PENERIMA</b>
                <br><br /><br />
                <form action="<?php echo site_url('welcome/create_penerima_brg') ?>" method="post">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty Beli</th>
                                <th>Qty Diterima</th>
                                <th>Qty Datang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($list as $key => $value):
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="id[]" value="<?= $value->id ?>">
                                    <input type="hidden" name="id_barang[]" value="<?= $value->id_barang ?>">
                                    <input type="text" value="<?= $no ?>" readonly>
                                </td>
                                <td>
                                    <input type="text" name="kode_barang[]" value="<?= $value->kode_barang ?>" readonly>
                                </td>
                                <td>
                                    <input type="text" name="nama_barang[]" value="<?= $value->nama_barang ?>"  readonly>
                                </td>
                                <td>
                                    <input type="text" name="qty_beli[]" value="<?= $value->qty ?>" readonly>
                                </td>
                                <td>
                                    <input type="hidden" name="qty_diff[]" value="<?= $value->diff_qty ?>">
                                    <input type="text" name="qty_sisa[]" value="<?= $value->sisa_qty ?>" readonly>
                                </td>
                                <td>
                                    <input type="text" name="qty_diterima[]" required>
                                </td>
                            </tr>
                            <?php
                                $no++;
                                endforeach;
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <button type="submit">simpan</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>
</body>

</html>