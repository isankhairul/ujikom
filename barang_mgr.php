<?php
include_once 'include/class.php';
include_once 'include/lib.php';

//$user = new User();
$sup = new barang();

$iduser = $_SESSION['id'];
if (!$user->get_sesi())
{
 header("location:index.php");
 }
?>
<b>DATA BARANG</b>
<div class="subnav">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/tabdata01.gif" /></td>
			<td class="tabsubnav">
				<b>DATA</b><a href="?page=addbarang">TAMBAH</a>
			</td>
			<td><img src="images/tabdata03.gif" /></td>
		</tr>
	</table>
</div><br />
<table class="tabholder"  border="0" cellspacing="0" cellpadding="3">
	<tr class="tabhead">
		<td width="40%">
			<form method="post" action="?page=barang_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="lihat" />
				<input name="sb" type="submit" class="button" value="Lihat Semua Data">		  
			</form>
		</td>
		<td width="60%" align="right">
			<form method="post" action="?page=barang_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="find" /><b>Cari Nama Barang &nbsp; : &nbsp;</b>		  
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
        <td align="center" class="tabtxt">ID Barang</td>
		<!--<td align="center" class="tabtxt">Merek</td>-->
		<td align="center" class="tabtxt">Nama Barang</td>
		<td align="center" class="tabtxt">Harga</td>
		<td align="center" width="70" class="tabtxt">Aksi</td>
	</tr>
<?php
//Tampilkan semua angsur
$arrayangsur=$sup->tampilbarang();

//tampilkan semua lewat tombol lihat semua
if($_POST['do']=='lihat'){
$arrayangsur=$sup->tampilbarang();
}
//tampilkan berdasarkan filter nama
elseif($_POST['do']=='find') {
$arrayangsur=$sup->searchbarang($_POST['q']);
} 

if (count($arrayangsur)) {
  foreach($arrayangsur as $data) {
?>
	<tr class="tabcont">
		<td class="tabtxt" align="center"><?php echo $c=$c+1;?>.</td>
        <td class="tabtxt" align="center"><?php echo $data['id_barang'] ;?></td>
		<!--<td class="tabtxt" align="center"><?php echo $sup->ambilmerek($data['id_merek']);?></td>-->
		<td class="tabtxt" align="center"><?php echo $data['nama_barang']; ?></td>
        <td class="tabtxt" align="center"><?php echo $data['harga'];?></td>
		<td align="left">
			<div class="tabtxt imghref">
				<span class="dashnav">&nbsp;</span>
				<a href="?page=edit_barang&aksi=edit&id_barang=<?php echo $data['id_barang'];?>">
					<img src="images/ico_edit.gif" class="ico" border="0" title="Edit" />
				</a>
				<span class="dashnav">&nbsp;</span>
				<a href="?page=edit_barang&aksi=hapus&id_barang=<?php echo $data['id_barang'];?>">
					<img src="images/ico_del.gif" class="ico" border="0" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"/>
				</a>
			</div>
		</td>
	</tr>
<?php 
  } 
} 
else {
  echo 'Nama Barang Tidak Ada!';
}
?>
</table>
</p>
<img src="images/ico_edit.gif" border="0" title="Edit" /> = Edit barang &nbsp;&nbsp;			
<img src="images/ico_del.gif" border="0" title="Delete" /> = Hapus barang			