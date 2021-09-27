<div class="menu-left">
    <ul>
        <li><a href="<?php echo site_url('welcome/hal_beranda') ?>">Beranda</a>
            <ul>
                <li><a href="<?php echo site_url('welcome/hal_profile') ?>">Profile</a></li>
            </ul>
        </li>
        <li><a href="<?php echo site_url('welcome/hal_beranda') ?>">Transaksi</a>
            <ul>
                <?php
                if ($this->session->userdata('status') === 'Direktur') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_penjualan') ?>">Penjualan</a></li>
                <?php
                endif;
                ?>
                <?php
                if ($this->session->userdata('status') === 'Manager') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_pembelian') ?>">Pembelian</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_retur') ?>">Retur</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_penjualan') ?>">Penjualan</a></li>
                <?php
                endif;
                ?>
                <?php
                if ($this->session->userdata('status') === 'Staff Penjualan') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_penjualan') ?>">Penjualan</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_retur') ?>">Retur</a></li>
                <?php
                endif;
                ?>
                <?php
                if ($this->session->userdata('status') === 'Staff Finance') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_pembelian') ?>">Pembelian</a></li>
                <?php
                endif;
                ?>
                <?php
                if ($this->session->userdata('status') === 'gudang' && $this->session->userdata('status') === 'Staff Admin Gudang') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_retur') ?>">Retur</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_pengiriman') ?>">Pengiriman</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_penerima') ?>">Penerima</a></li>
                <?php
                endif;
                ?>
                <?php
                if ($this->session->userdata('status') === 'admin') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_penjualan') ?>">Penjualan</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_pembelian') ?>">Pembelian</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_retur') ?>">Retur</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_pengiriman') ?>">Pengiriman</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_penerima') ?>">Penerima</a></li>
                    <li><a href="<?php echo site_url('welcome/hal_approval') ?>">Approval</a></li>
                <?php
                endif;
                ?>
                <li><a href="<?php echo site_url('welcome/hal_penjualan') ?>">Penjualan</a></li>
                <li><a href="<?php echo site_url('welcome/hal_pembelian') ?>">Pembelian</a></li>
                <li><a href="<?php echo site_url('welcome/hal_retur') ?>">Retur</a></li>
                <li><a href="<?php echo site_url('welcome/hal_pengiriman') ?>">Pengiriman</a></li>
                <li><a href="<?php echo site_url('welcome/hal_penerima') ?>">Penerima</a></li>
                <?php
                if ($this->session->userdata('status') === 'Manager') :
                ?>
                    <li><a href="<?php echo site_url('welcome/hal_approval') ?>">Approval</a></li>
                <?php
                endif;
                ?>
            </ul>
        </li>
        <?php
        if ($this->session->userdata('status') === 'Direktur') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_stok') ?>">Stok Barang</a></li>
        <?php
        endif;
        ?>
        <?php
        if ($this->session->userdata('status') === 'Manager') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_stok') ?>">Stok Barang</a></li>
        <?php
        endif;
        ?>
        <?php
        if ($this->session->userdata('status') === 'gudang' && $this->session->userdata('status') === 'Staff Admin Gudang') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_stok') ?>">Stok Barang</a></li>
        <?php
        endif;
        ?>
        <?php
        if ($this->session->userdata('status') === 'Staff Finance') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_pemasok') ?>">Pemasok</a></li>
        <?php
        endif;
        ?>
        <?php
        if ($this->session->userdata('status') === 'Staff Penjualan') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_konsumen') ?>">Konsumen</a></li>
            <li><a href="<?php echo site_url('welcome/hal_stok') ?>">Stok Barang</a></li>
        <?php
        endif;
        ?>
        <?php
        if ($this->session->userdata('status') === 'admin') :
        ?>
            <li><a href="<?php echo site_url('welcome/hal_stok') ?>">Stok Barang</a></li>
            <li><a href="<?php echo site_url('welcome/hal_pemasok') ?>">Pemasok</a></li>
            <li><a href="<?php echo site_url('welcome/hal_konsumen') ?>">Konsumen</a></li>
            <li><a href="<?php echo site_url('welcome/form_daftar') ?>">Daftar</a></li>
        <?php
        endif;
        ?>
        <li><a href="<?php echo site_url('welcome/logout') ?>">Keluar</a></li>
    </ul>
</div>