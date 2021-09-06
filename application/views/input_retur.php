<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nexx Store Inventory</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                <b>INPUT RETUR</b>
                <br><br /><br />

                <form action="<?php echo site_url('welcome/create_retur') ?>" method="post">
                    <input type="hidden" name="penjualan_id">
                    <input type="hidden" name="barang_id">
                    Kode Retur<br />
                    <input type="text" name="kode_retur" required/><br /><br />
                    Kode Penjualan<br />
                    <select name="id_penjualan" id="" style="width: 20%;" onchange="getVal(this)">
                        <option value="" selected disabled>pilih kode penjualan</option>
                        <?php
                        foreach ($listPenjualan as $key => $value) :
                        ?>
                            <option value="<?= $value->kode_penjualan ?>"><?= $value->kode_penjualan ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select><br /><br />
                    Nama Barang <br />
                    <select name="barang" style="width: 30%;" onchange="getValId(this)"></select><br /><br />
                    Harga<br />
                    <input type="number" name="harga" style="width: 10%" required readonly/><br /><br />
                    Jumlah<br />
                    <input type="number" name="jml" style="width: 10%" required /><br /><br />
                    Deskripsi<br />
                    <input type="text" name="deskripsi" style="width:50%" required /><br /><br />
                    <input type="submit" name="simpan" value="Simpan" style="height:30px; width:20%;" />
                </form>

            </div>

        </div>

    </div>

    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>
    <script>
        function getVal(id) {
            $.getJSON("<?= base_url('welcome/get_list_json_penjualan?po=')?>" + id.value, function(data) {
                let htmlRender = '<option disabled selected>pilih barang</option>';
                for (let index = 0; index < data.length; index++) {
                    const element = data[index];
                    htmlRender += `<option value="${element.id}" data-product="${element.barang_id}">${element.nama_barang}</option>`;
                }
                $("[name='barang']").empty().html(htmlRender);
            });
        }

        function getValId(val)
        {
            const barang_id = val.selectedOptions[0].getAttribute('data-product'); 
            $("[name='penjualan_id']").val(val.value);
            $.getJSON("<?= base_url('welcome/get_list_product_by_id?id=')?>" + barang_id, function(data) {
                $("[name='harga']").val(data.harga);
            });
        }
    </script>
</body>
</html>