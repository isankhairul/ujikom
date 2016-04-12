<?php
include_once 'include/class.php';
include_once 'include/lib.php';

// instance objek user
$user = new User();

// instance objek cust
$cust = new customer();

$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
  header("location:index.php");
}

// proses hapus data
if (isset($_GET['aksi']))
{
	if ($_GET['aksi'] == 'hapus')
	{
		// baca ID dari parameter ID customer yang akan dihapus
		$id = $_GET['id_cust'];
		// proses hapus data customer berdasarkan ID via method
		$cust->hapuscust($id);	
	}

	// proses edit data
	else if ($_GET['aksi'] == 'edit')
	{
		// baca ID customer yang akan diedit
		$id = $_GET['id_cust'];

?>
<link rel="stylesheet" href="kalender/calendar.css" type="text/css">
<script type="text/javascript" src="kalender/calendar.js"></script>
<script type="text/javascript" src="kalender/calendar2.js"></script>
<script>
	function checkForm(formZ){
		if(formZ.nama.value==''){
			alert('Nama customer tidak boleh kosong.');
			formZ.nama.focus();
			return false;
		}
		if(formZ.tmpt_lahir.value==''){
			alert('Tempat lahir tidak boleh kosong.');
			formZ.tmpt_lahir.focus();
			return false;
		}
		if(formZ.tgl_lahir.value==''){
			alert('Tanggal lahir tidak boleh kosong.');
			formZ.tgl_lahir.focus();
			return false;
		}
		if(formZ.alamat.value==''){
			alert('Alamat tidak boleh kosong.');
			formZ.alamat.focus();
			return false;
		}
		if(formZ.ktp.value==''){
			alert('Nomor KTP tidak boleh kosong.');
			formZ.ktp.focus();
			return false;
		}
		if(formZ.telp.value==''){
			alert('Nomor telepon tidak boleh kosong.');
			formZ.telp.focus();
			return false;
		}
	}
</script>

<b>EDIT PELANGGAN</b>	
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
	<form name="customer" action="?page=customer_edit&aksi=update" method="post" onsubmit="return chekForm(this)">
		<tr>
			<td width="15%"><div class="tabtxt">ID Customer</div></td>
			<td width="2%"><div class="tabtxt">:</div></td>
			<td width="83%">
				<input name="id_cust" style="width:100px" type="textfield" class="tfield" value="<?php echo $cust->bacadata('id_cust',$id); ?>" readonly>
			</td>
    </tr>          
    <tr>
			<td width="15%"><div class="tabtxt">Nama Pelanggan</div></td>
			<td width="2%"><div class="tabtxt">:</div></td>
			<td width="83%">
				<input name="nama" style="width:200px" type="textfield" class="tfield" value="<?php echo $cust->bacadata('nama',$id);?>">
			</td>
		</tr>
		<!--<tr>
			<td><div class="tabtxt">Tempat, Tgl. Lahir</div></td>
			<td><div class="tabtxt">:</div></td>
			<td>
				<input name="tmpt_lahir" style="width:100px" type="textfield" class="tfield" value="<?php echo $cust->bacadata('tempat_lahir', $id); ?>">&nbsp;		
				<input name="tgl_lahir" style="width:80px" type="textfield" id="tgl" class="tfield" value="<?php echo tgl_eng_to_ind($cust->bacadata('tanggal_lahir', $id)); ?>" readonly>
				<a href="JavaScript:;" onClick="return showCalendar('tgl', 'dd-mm-y');"><img border=0 src="images/ico_calendar.gif" align="top"></a>
			</td>
		</tr>-->
		<tr>
			<td valign="top"><div class="tabtxt">Alamat</div></td>
			<td valign="top"><div class="tabtxt">:</div></td>
			<td>
				<textarea name="alamat" style="width:200px" class="tfield" rows="4"><?php echo $cust->bacadata('alamat',$id);?></textarea>
			</td>
		</tr>
        <tr>
			<td><div class="tabtxt">Telepon</div></td>
			<td><div class="tabtxt">:</div></td>
			<td>
				<input name="ktp" style="width:200px" type="textfield" class="tfield" value="<?php echo $cust->bacadata('ktp',$id);?>">
			</td>
		</tr>
		<!--<tr>
			<td valign="top"><div class="tabtxt">telepon</div></td>
			<td valign="top"><div class="tabtxt">:</div></td>
			<td>
				<input name="telp" style="width:200px" type="textfield" class="tfield" value="<?php echo $cust->bacadata('telepon', $id); ?>">
			</td>
		</tr>-->
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>
				<input name="submit" type="submit" class="button" value="Simpan">&nbsp;&nbsp;
				<input type="button" class="button" value="Batal" onclick=self.history.back()>
			</td>
		</tr>
	</form>
</table>
<?php
	}
	else if ($_GET['aksi'] == 'update') {
		// update data customer via method
		$cust->updatecust($_POST['id_cust'],$_POST['nama'],$_POST['alamat'],$_POST['ktp'],$_POST['tmpt_lahir'], tgl_ind_to_eng($_POST['tgl_lahir']),$_POST['telp']);
	} 
}
?>
