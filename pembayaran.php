<?php
include_once 'include/class.php';
include_once 'include/lib.php';

$user = new User();
$brg = new angsur();

$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
    header("location:index.php");
}
if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // baca ID dari parameter ID customer yang akan dihapus
        $id = $_GET['id_barang'];
        // proses hapus data customer berdasarkan ID via method
        $brg->hapus($id);
    }
    // baca ID Barang yang akan diedit
    else if ($_GET['aksi'] == 'bayar') {
        $id = $_GET['id_trans'];
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
            if(formZ.sisa.value==''){
            alert('sisa tidak boleh kosong.');
            formZ.sisa.focus();
            return false;
            }
            if(formZ.tgl_byr.value==''){
            alert('Tanggal transaksi tidak boleh kosong.');
            formZ.tgl_byr.focus();
            return false;
            }
            }

        </script>
        <b>DETAIL TRANSAKSI</b>
        <table width="100%"  border="0" cellspacing="0" cellpadding="3">
            <form name="angsur" action="?page=pembayaran&aksi=update" method="post" onsubmit="return checkForm(this)">   

                <tr>
                    <td width="15%"><div class="tabtxt">ID Transaksi</div></td>
                    <td width="2%"><div class="tabtxt">:</div></td>
                    <td width="83%">
                        <input name="id" id="id" style="width:100px" type="textfield" class="tfield" value="<?php echo $id; ?>" readonly>			</td>
                </tr> 
                <tr>
                    <td width="15%"><div class="tabtxt">Nama Customer</div></td>
                    <td width="2%"><div class="tabtxt">:</div></td>
                    <td width="83%">
                        <input name="nama" style="width:200px" type="textfield" class="tfield" value="<?php echo $brg->bacatransaksi('nama', $id); ?>" readonly>			</td>
                </tr>
                <tr>
                    <td><div class="tabtxt">Nama Barang</div></td>
                    <td><div class="tabtxt">:</div></td>
                    <td>
                        <input name="barang" id="barang" type="text" class="tfield_a" value="<?php echo $brg->bacatransaksi('nama_barang', $id); ?>" readonly>			</td>
                </tr>
                <tr>
                    <td valign="top"><div class="tabtxt">Harga</div></td>
                    <td valign="top"><div class="tabtxt">:</div></td>
                    <td>Rp. 
                        <input name="hrg" id="hrg" type="text" class="tfield_a" value="<?php echo $brg->bacatransaksi('harga', $id); ?>" readonly></td> 
                </tr>
                <tr>
                    <td valign="top"><div class="tabtxt">Down Payment (DP)</div></td>
                    <td valign="top"><div class="tabtxt">:</div></td>
                    <td>
                        Rp. 
                        <input name="dp" id="dp" type="text" class="tfield_a" value="<?php echo $brg->bacatransaksi('dp', $id); ?>" readonly></td> 
                </tr>

                <tr>
                    <td valign="top"><div class="tabtxt">Sisa Bayar</div></td>
                    <td valign="top"><div class="tabtxt">:</div></td>
                    <td>
                        Rp.			
                        <input  name="selisih" id="selisih" type="text" class="tfield_a" value="<?php echo $brg->bacatransaksi('selisih', $id); ?>" disabled="disabled" /></td> 
                </tr>
                <tr>
                    <td><div class="tabtxt">Tanggal Bayar</div></td>
                    <td><div class="tabtxt">:</div></td>
                    <td>
                        <input name="tgl_byr" style="width:80px" type="textfield" id="tgl" class="tfield" readonly>
                        <a href="JavaScript:;" onClick="return showCalendar('tgl', 'dd-mm-y');"><img border=0 src="images/ico_calendar.gif" align="top"></a>			</td>
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>
                        <input name="submit" type="submit" class="button" value="Bayar">&nbsp;&nbsp;
                        <input type="button" class="button" value="Batal" onclick=self.history.back()>			</td>
                </tr>
            </form>
        </table>
        <?php
    } else if ($_GET['aksi'] == 'update') {

        //echo "$_POST['nama']";
        $brg->bayar($_POST['id'], $_POST['selisih'], $_POST['tgl_byr']);

        //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=detail_mgr">'; 
    }
}
?>