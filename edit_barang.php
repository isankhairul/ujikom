<?php
include_once 'include/class.php';
include_once 'include/lib.php';

// instance objek user
$user = new User();

// instance objek cust
$brg = new barang();

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
		$id = $_GET['id_barang'];
		// proses hapus data customer berdasarkan ID via method
		$brg->hapusbarang($id);	
	}

	// proses edit data
	else if ($_GET['aksi'] == 'edit')
	{
		// baca ID Barang yang akan diedit
		$id = $_GET['id_barang'];

?>
<link rel="stylesheet" href="kalender/calendar.css" type="text/css">
<script type="text/javascript" src="kalender/calendar.js"></script>
<script type="text/javascript" src="kalender/calendar2.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script language="JavaScript" type="text/JavaScript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=merek>
  $("#merek").change(function(){
    var merek = $("#merek").val();
    $.ajax({
        url: "ambilbarang.php",
        data: "merek="+merek,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=barang>
            $("#barang").html(msg);
        }
    });
  });
	  /* $("#nilai").change(function(){
	  var nilai = $('#nilai').val()
		$.ajax({
		url: "ambilharga.php",
		data: "nilai="+nilai,
		cache: false,
		success: function(msg){
		$("#hrg").html(msg);
         }
     });
   }); */
});

	 function checkForm(formZ)
	 {
		 if(formZ.merek.value==''){
			 alert('pilih merek');
			 formZ.merek.focus();
			 return false;
		 }
		 if(formZ.barang.value==''){
			 alert('barang tidak boleh kosong.');
			 formZ.barang.focus();
			 return false;
		 }
		 if(formZ.hrg.value==''){
			 alert('Harga tidak boleh kosong.');
			 formZ.hrg.focus();
			 return false;
		 }
	 }

</script>
<b>EDIT BARANG</b>
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
	<form name="barang" action="?page=edit_barang&aksi=update" method="post" onsubmit="return checkForm(this)">   
		
		<tr>
			<td valign="top"><div class="tabtxt">ID Barang</div></td>
			<td valign="top"><div class="tabtxt">:</div></td>
			<td>
				<input name="id" style="width:100px" type="textfield" class="tfield" value="<?php echo $brg->bacadata('id_barang',$id);?>" readonly>
			</td> 
		</tr>
		<tr>
			<td><div class="tabtxt">Nama Barang</div></td>
			<td><div class="tabtxt">:</div></td>
			<td>
				<input name="barang" type="text" class="tfield_a" value="<?php echo $brg->bacadata('nama_barang',$id);?>">
			</td>
		</tr>
		<!--<tr>
			<td><div class="tabtxt">Merek Barang</div></td>
			<td><div class="tabtxt">:</div></td>
			<td>
			<select name="merek" class="tfield_a" id="merek">
			<option>Pilih</option>
			<?php
			//Tampilkan combo nama sales
			$arrayNama=$brg->combomerek();
			foreach($arrayNama as $datanama)
			{
			?>
				<option value="<?php  echo $brg->bacadata['id_merek']; ?>"><?php  echo $datanama['id_merek']; ?></option>
			<?php } ?>
			
			</select>
			</td>
		</tr>-->
		<tr>
			<td valign="top"><div class="tabtxt">Harga</div></td>
			<td valign="top"><div class="tabtxt">:</div></td>
			<td>
				<input name="hrg" id="hrg" type="text" class="tfield_a" value="<?php echo $brg->bacadata('harga',$id);?>">
			</td> 
		</tr>
	
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>
				<input name="submit" type="submit" class="button" value="Simpan" >&nbsp;&nbsp;
				<input type="button" class="button" value="Batal" onclick=self.history.back()>
			</td>
		</tr>
	</form>
</table>
<?php
		}
	if($_POST['submit']){
	$brg->updatedata($_POST['id'],$_POST['merek'],$_POST['barang'],$_POST['hrg']);
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=barang_mgr">'; 
	}

 }
?>