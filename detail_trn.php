<?php
include_once 'include/class.php';
include_once 'include/lib.php';

$user = new User();
$sup = new angsur();

$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
    header("location:index.php");
}
?>
<link rel="stylesheet" href="kalender/calendar.css" type="text/css">
<script type="text/javascript" src="kalender/calendar.js"></script>
<script type="text/javascript" src="kalender/calendar2.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script language="JavaScript" type="text/JavaScript">
    //var htmlobjek;
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
    if(formZ.nama_c.value==''){
    alert('pilih nama customer');
    formZ.nama_c.focus();
    return false;
    }
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
    if(formZ.dp.value==''){
    alert('dp tidak boleh kosong.');
    formZ.dp.focus();
    return false;
    }
    if(formZ.tgl_trans.value==''){
    alert('Tanggal transaksi tidak boleh kosong.');
    formZ.tgl_trans.focus();
    return false;
    }
    }

</script>
<b>DETAIL TRANSAKSI</b>
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
    <form name="angsur" action="?page=detail_trn" method="post" onsubmit="return checkForm(this)">   

        <tr>
            <td width="15%"><div class="tabtxt">ID Transaksi</div></td>
            <td width="2%"><div class="tabtxt">:</div></td>
            <td width="83%">
                <input name="id_trans" style="width:100px" type="textfield" class="tfield" value="<?php echo kdauto("transaksi", "TR"); ?>" readonly>
            </td>
        </tr> 
        <tr>
            <td valign="top"><div class="tabtxt">Nama Customer</div></td>
            <td valign="top"><div class="tabtxt">:</div></td>
            <td>
                <select name="nama_c" class="tfield_a">
                    <option value="0" selected="selected">Pilih Customer</option>
                    <?php
                    //Tampilkan combo nama sales
                    $arrayNama = $sup->combonmc();
                    foreach ($arrayNama as $datanama) {
                        ?>
                        <option value="<?php echo $datanama['id_cust']; ?>"><?php echo $datanama['nama']; ?></option>
                    <?php } ?>

                </select>
            </td> 
        </tr>

        <tr>
            <td><div class="tabtxt">Merek</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <select name="merek" class="tfield_a" id="merek">
                    <option>Pilih</option>
<?php
//Tampilkan combo nama sales
$arrayNama = $sup->combomerek();
foreach ($arrayNama as $datanama) {
    ?>
                        <option value="<?php echo $datanama['n_merek']; ?>"><?php echo $datanama['n_merek']; ?></option>
                    <?php } ?>

                </select>	
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Nama Barang</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <select name="barang" class="tfield_a" id="barang">
                    <option>Pilih</option>
<?php
//Tampilkan combo nama sales
$arrayNama = $sup->combobarang();
foreach ($arrayNama as $datanama) {
    ?>
                        <option value="<?php echo $datanama['nama_barang']; ?>"><?php echo $datanama['nama_barang']; ?></option>
                    <?php } ?>

                </select>
            </td>
        </tr>

        <tr>
            <td valign="top"><div class="tabtxt">DP</div></td>
            <td valign="top"><div class="tabtxt">:</div></td>
            <td>
                <input name="dp" type="text" class="tfield_a">
            </td> 
        </tr>
        <tr>
            <td><div class="tabtxt">Tanggal Transaksi</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="tgl_trans" style="width:80px" type="textfield" id="tgl" class="tfield" readonly>
                <a href="JavaScript:;" onClick="return showCalendar('tgl', 'dd-mm-y');"><img border=0 src="images/ico_calendar.gif" align="top"></a>
            </td>
        </tr>

        <tr>
            <td colspan="2">&nbsp;</td>
            <td>
                <input name="submit" type="submit" class="button" value="OK" onClick="get();">&nbsp;&nbsp;
                <input type="button" class="button" value="Batal" onclick=self.history.back()>
            </td>
        </tr>
    </form>
</table>
<?php
if ($_POST['submit']) {
    // tambah data customer via method
    //echo "$_POST['nama']";
    $sup->tambahData($_POST['id_trans'], $_POST['nama_c'], $_POST['barang'], $_POST['dp'], tgl_ind_to_eng($_POST['tgl_trans']));
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=detail_mgr">';
}
?>