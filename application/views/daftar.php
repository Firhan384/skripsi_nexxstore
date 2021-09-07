<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Nexx Store Inventory</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css') ?>">
</head>

<body>
    <div class="header">
        NEXX STORE INVENTORY
    </div>
    <div class="section">
        <div class="section-2">
            <div class="section-daftar">
                Daftar Dengan Data Yang Benar & Sesuai!
            </div>
            <form method="post" action="<?php echo site_url('welcome/insert') ?>">
                <table>
                    <tr>
                        <td>Nama Lengkap
                        <td>:
                        <td><input type="text" name="nama" required="required" style="width:105%;" /></td>
                    </tr>
                    <tr>
                        <td>Email
                        <td>:
                        <td><input type="text" name="email" required="required" style="width:105%;" /></td>
                    </tr>
                    <tr>
                        <td>No Hp
                        <td>:
                        <td><input type="text" name="hp" required="required" /></td>
                    </tr>
                    <tr>
                        <td>User Id
                        <td>:
                        <td><input type="text" name="id" required="required" /></td>
                    </tr>
                    <tr>
                        <td>Password
                        <td>:
                        <td><input type="password" name="password" required="required" /></td>
                    </tr>
                    <tr>
                        <td>Status
                        <td>:
                        <td><select name="status" style="width:50%;" required>
                                <option selected disabled>pilih level</option>
                                <option value="admin">Admin </option>
                                <option value="manager">Manajer </option>
                                <option value="gudang">Bagian Gudang</option>
                            </select></td>
                    </tr>
                </table>
                <div class="klik-daftar">
                    <input type="submit" name="daftar" value="Daftar" style="height:25px; width:25%; margin-left:35%; 
                            margin-top:5%;" />
                </div>
            </form>
            <br>
            <a href="<?php echo site_url('welcome/index') ?>">
                <div style="text-align:center; font-size:20px; height:30px; color:#000; font-weight:bold; width:100%;">
                    <?php echo $this->session->flashdata('sukses') ?>
                </div>
            </a>
        </div>
    </div>
    <div class="footer">
        2021 &copy; Nexx Store Inventory
    </div>
</body>

</html>