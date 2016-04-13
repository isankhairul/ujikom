<?php
if (!$user->get_sesi()) {
    header("location:index.php");
}
?>
<ul>
    <li><a href="?page=home">Home</a></li>
    <?php if(in_array("teknisi", $listAccess)){ ?>
    <li><a href="?page=teknisi_mgr">Data Teknisi</a></li>
    <?php } ?>
    <?php if(in_array("pelanggan", $listAccess)){ ?>
    <li><a href="?page=pelanggan_mgr">Data Pelanggan</a></li>
    <?php } ?>
    <?php if(in_array("barang", $listAccess)){ ?>
    <li><a href="?page=barang_mgr">Data Barang</a></li>
    <?php } ?>
    <?php if(in_array("jadwal", $listAccess)){ ?>
    <li><a href="?page=jadwal_mgr">Data Jadwal</a></li>
    <?php } ?>
    <?php if(in_array("transaksi", $listAccess)){ ?>
    <li><a href="?page=transaksi_mgr">Data Transaksi</a></li>
    <?php } ?>
    <li><a href="?page=logout">Keluar</a></li>
</ul>
