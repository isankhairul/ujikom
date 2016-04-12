<?php
if (!$user->get_sesi()) {
    header("location:index.php");
}
?>
<ul>
    <li><a href="?page=home">Home</a></li>
    <li><a href="?page=teknisi_mgr">Data Teknisi</a></li>
    <li><a href="?page=customer_mgr">Data Pelanggan</a></li>
    <li><a href="?page=barang_mgr">Data Barang</a></li>
    <li><a href="?page=detail_mg">Data Transaksi</a></li>
    <li><a href="?page=logout">Keluar</a></li>
</ul>
