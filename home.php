<?php 
include_once 'include/class.php';
$user = new User();
if (!$user->get_sesi())
{
header("location:index.php");
}
 ?>
<div class="subtitle" align="left">
	<p> Selamat Datang di <br>
	<br />
	<b>Sistem Informasi Pelayanan Perbaikan dan Pemasangan Baru Mesin Pendingin Ruangan Di CV. TRIDAYA MANUNGGAL TEKNIK<br>
	<br />
    </p></div>