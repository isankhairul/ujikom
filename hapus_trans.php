<?php
include_once 'include/class.php';
include_once 'include/lib.php';

$user = new User();
$sup = new angsur();

$iduser = $_SESSION['id'];
if (!$user->get_sesi())
{
 header("location:index.php");
 }
 if (isset($_GET['aksi']))
{
	if ($_GET['aksi'] == 'hapus')
	{
		// baca ID dari parameter ID sales yang akan dihapus
		$id = $_GET['id_trans'];
		// proses hapus data sales berdasarkan ID via method
		$sup->hapustransaksi($id);	
	}

	// proses edit data
	else if ($_GET['aksi'] == 'edit')
	{
		// baca ID sales yang akan diedit
		$id = $_GET['id_trans'];
}
}
?>