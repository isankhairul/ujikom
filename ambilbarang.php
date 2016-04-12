<?php

include_once 'include/class.php';

$db = new Database();

// koneksi ke MySQL via method
$db->connectMySQL();


$merek = $_GET['merek'];
$barang = mysql_query("SELECT id_barang,nama_barang FROM barang WHERE id_merek='$merek' order by nama_barang");
echo "<option>Pilih</option>";
while ($b = mysql_fetch_array($barang)) {
    echo "<option value=\"" . $b['nama_barang'] . "\">" . $b['nama_barang'] . "</option>\n";
}
?>