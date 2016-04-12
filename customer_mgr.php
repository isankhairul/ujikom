<?php
include_once 'include/class.php';
include_once 'include/lib.php';

//$user = new User();
$cust = new customer();

$iduser = $_SESSION['id'];
if (!$user->get_sesi())
{
 header("location:index.php");
 }
?>
<b>DATA PELANGGAN</b>
<div class="subnav">
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td><img src="images/tabdata01.gif" /></td>
			<td class="tabsubnav">
				<b>DATA</b><a href="?page=customer_add">TAMBAH</a>
			</td>
			<td><img src="images/tabdata03.gif" /></td>
		</tr>
	</table>
</div><br />
<table class="tabholder"  border="0" cellspacing="0" cellpadding="3">
	<tr class="tabhead">
		<td width="40%">
			<form method="post" action="?page=customer_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="lihat" />
				<input name="sb" type="submit" class="button" value="Lihat Semua Data">		  
			</form>
		</td>
		<td width="60%" align="right">
			<form method="post" action="?page=customer_mgr" onsubmit="if(this.q.value)return true;else return false;">
				<input type="hidden" name="do" value="find" /><b>Cari Nama Pelanggan &nbsp; : &nbsp;</b>		  
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
        <td align="center" class="tabtxt">ID Pelanggan</td>
		<td align="center" class="tabtxt">Nama Pelanggan</td>
		<td align="center" class="tabtxt">Telepon</td>
        <td align="center" class="tabtxt">Alamat</td>
		<td align="center" width="70" class="tabtxt">Aksi</td>
	</tr>
<?php
//Tampilkan semua customer
$arraycustomer=$cust->tampilcust();

//tampilkan semua lewat tombol lihat semua
if($_POST['do']=='lihat'){
$arraycustomer=$cust->tampilcust();
}
//tampilkan berdasarkan filter nama
elseif($_POST['do']=='find') {
$arraycustomer=$cust->searchcust($_POST['q']);
} 

if (count($arraycustomer)) {
  foreach($arraycustomer as $data) {
?>
	<tr class="tabcont">
		<td class="tabtxt" align="center"><?php echo $c=$c+1;?>.</td>
        <td class="tabtxt" align="center"><?php echo $data['id_cust'] ?></td>
		<td class="tabtxt" align="center"><?php echo $data['nama'];?></td>
		<td class="tabtxt" align="center"><?php echo $data['ktp']; ?></td>
        <td class="tabtxt" align="center"><?php echo $data['alamat'];?></td>
		<td align="left">
			<div class="tabtxt imghref">
				<span class="dashnav">&nbsp;</span>
				<a href="?page=customer_edit&aksi=edit&id_cust=<?php echo $data['id_cust'];?>">
					<img src="images/ico_edit.gif" class="ico" border="0" title="Edit" />
				</a>
				<span class="dashnav">&nbsp;</span>
				<a href="?page=customer_edit&aksi=hapus&id_cust=<?php echo $data['id_cust'];?>">
					<img src="images/ico_del.gif" class="ico" border="0" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"/>
				</a>
			</div>
		</td>
	</tr>
<?php 
  } 
} 
else {
  echo 'Nama customer Tidak Ada!';
}
?>
</table>
</p>
<img src="images/ico_edit.gif" border="0" title="Edit" /> = Edit Pelanggan &nbsp;&nbsp;			
<img src="images/ico_del.gif" border="0" title="Delete" /> = Hapus Pelanggan			