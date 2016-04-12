<?php
include_once 'include/class.php';
include_once 'include/lib.php';

//$user = new User();
$sup = new angsur();

$iduser = $_SESSION['id'];
if (!$user->get_sesi())
{
 header("location:index.php");
 }
?>
<b>DATA TRANSAKSI</b>
<div class="subnav">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/tabdata01.gif" /></td>
			<td class="tabsubnav">
				<b>DATA</b><a href="?page=detail_trn">TAMBAH</a>
			</td>
			<td><img src="images/tabdata03.gif" /></td>
		</tr>
	</table>
</div><br />
<table class="tabholder"  border="0" cellspacing="0" cellpadding="3">
	<tr class="tabhead">
		<td width="40%">
			<form method="post" action="?page=detail_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="lihat" />
				<input name="sb" type="submit" class="button" value="Lihat Semua Data">		  
			</form>
		</td>
		<td width="60%" align="right">
			<form method="post" action="?page=detail_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="find" /><b>Cari Nama Customer &nbsp; : &nbsp;</b>		  
				<input class="tfield"  type="text" name="q" title="Masukkan kata kunci pencarian." />&nbsp;&nbsp;
				<input name="submit" type="submit" class="button" value="Cari" />
			</form>
		</td>
	</tr>
</table>
<br>
<table class="tabholder" border="0" cellspacing="1" cellpadding="0">
	<tr class="tabhead">
		<td align="center" width="30" class="tabtxt">No</td>
        <td align="center" class="tabtxt">ID angsur</td>
		<td align="center" class="tabtxt">Nama Customer</td>
		<td align="center" class="tabtxt">Nama Barang</td>
		<td align="center" class="tabtxt">DP</td>
        <td align="center" class="tabtxt">Status</td>
        <td align="center" class="tabtxt">Tanggal Transaksi</td>
		<td align="center" width="70" class="tabtxt">Aksi</td>
	</tr>
<?php
//Tampilkan semua angsur
$arrayangsur=$sup->tampiltrans();

//tampilkan semua lewat tombol lihat semua
if($_POST['do']=='lihat'){
$arrayangsur=$sup->tampiltrans();
}
//tampilkan berdasarkan filter nama
elseif($_POST['do']=='find') {
$arrayangsur=$sup->searchtrans($_POST['q']);
} 

if (count($arrayangsur)) {
  foreach($arrayangsur as $data) {
?>
	<tr class="tabcont">
		<td class="tabtxt" align="center"><?php echo $c=$c+1;?>.</td>
        <td class="tabtxt" align="center"><?php echo $data['id_trans'] ?></td>
		<td class="tabtxt" align="center"><?php echo $sup->ambilnama($data['id_cust']);?></td>
		<td class="tabtxt" align="center"><?php echo $data['nama_barang']; ?></td>
        <td class="tabtxt" align="center"><?php echo $data['dp'];?></td>
        <td class="tabtxt" align="center"><?php 
		if ($data['flag_bayar'] == '0') {
		echo "Belum Lunas";
		}
		else{
		echo "LUNAS";
		}
		;?></td>
		<td class="tabtxt" align="center"><?php echo $data['tgl_trans'];?></td>
		<td align="left">
			<div class="tabtxt imghref">
				<span class="dashnav">&nbsp;</span>
				<a href="?page=pembayaran&aksi=bayar&id_trans=<?php echo $field,$data['id_trans'];?>">
					<img src="images/bayar.ico" class="ico" border="0" title="bayar" />
				</a>
				<span class="dashnav">&nbsp;</span>
				<a href="?page=hapus_trans&aksi=hapus&id_trans=<?php echo $data['id_trans'];?>">
					<img src="images/ico_del.gif" class="ico" border="0" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"/>
				</a>
			</div>
		</td>
	</tr>
<?php 
  } 
} 
else {
  echo 'Nomor Transaksi Tidak Ada!';
}
?>
</table>			