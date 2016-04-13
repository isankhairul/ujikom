<?php
include_once 'include/class.php';
include_once 'include/lib.php';

// instance objek user
$user = new User();
$jdw = new jadwal();
$plg = new pelanggan();
$tkn = new teknisi();
$brg = new barang();

$id = $_GET['id_jadwal'];
$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
    header("location:index.php");
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // proses hapus data customer berdasarkan ID via method
        $jdw->hapusJadwal($id);
    }
}

?>
<link rel="stylesheet" href="assets/jquery-ui/jquery-ui.min.css" type="text/css">
<link rel="stylesheet" href="assets/jquery-ui/jquery-ui-timepicker-addon.css" type="text/css">
<script type="text/javascript" src="assets/jquery-ui/external/jquery/jquery.js"></script>
<script type="text/javascript" src="assets/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/jquery-ui/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript">
    $(function () {
        $("#tgl").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $("#jam").timepicker();
    });
</script>


<b>Jadwal</b>
<div class="subnav">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="images/tabdata01.gif" /></td>
            <td class="tabsubnav">
                <a href="?page=jadwal_mgr">DATA</a> &raquo; <b>Edit Jadwal</b>
            </td>
            <td><img src="images/tabdata03.gif" /></td>
        </tr>
    </table>
</div>		
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
    <form name="jadwal" method="post">
        <tr>
            <td><div class="tabtxt">ID Jadwal</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="id_jadwal" style="width:200px" class="tfield" readonly="readonly"
                       value="<?php echo $id; ?>">
            </td>
        </tr>
        <tr>
            <td width="15%"><div class="tabtxt">Pelanggan</div></td>
            <td width="2%"><div class="tabtxt">:</div></td>
            <td width="83%">
                <select name="id_pelanggan" required>
                    <?php foreach ($plg->tampilcust() as $item): ?>
                        <option value="<?php echo $item['id_pelanggan']; ?>"
                            <?php echo ($item['id_pelanggan'] == $jdw->bacadata($id)['id_pelanggan']) ? "selected" : ""; ?>>
                            <?php echo $item['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="15%"><div class="tabtxt">Teknisi</div></td>
            <td width="2%"><div class="tabtxt">:</div></td>
            <td width="83%">
                <select name="id_teknisi" required>
                    <?php foreach ($tkn->tampilteknisi() as $item): ?>
                        <option value="<?php echo $item['id']; ?>"
                            <?php echo ($item['id'] == $jdw->bacadata($id)['id_teknisi']) ? "selected" : ""; ?>>
                            <?php echo $item['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Barang</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <select name="id_barang" required>
                    <?php foreach ($brg->tampilbarang() as $item): ?>
                        <option value="<?php echo $item['id_barang']; ?>" 
                            <?php echo ($item['id_barang'] == $jdw->bacadata($id)['id_barang']) ? "selected" : ""; ?>>
                            <?php echo $item['nama_barang']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Tipe Pelayanan</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="tipe_pelayanan" style="width:200px" type="textfield" class="tfield" required 
                       value="<?php echo $jdw->bacadata($id)['tipe_pelayanan']; ?>">
            </td>
        </tr>
        
        <tr>
            <td><div class="tabtxt">Status</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <select name="status" required>
                <?php foreach ($jdw->getStatus() as $item){ ?>
                    <option value="<?php echo $item; ?>"
                        <?php echo ($item == $jdw->bacadata($id)['status']) ? "selected" : ""; ?>>
                        <?php echo $item; ?>
                    </option>
                <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Tanggal</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="tanggal" id="tgl" style="width:200px" type="textfield" class="tfield" readonly required
                       value="<?php echo $jdw->bacadata($id)['tanggal']; ?>">
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Jam</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="jam" id="jam" style="width:200px" type="textfield" class="tfield" required
                       value="<?php echo $jdw->bacadata($id)['jam']; ?>">
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Keterangan</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <textarea name="keterangan" cols="40" rows="4"><?php echo $jdw->bacadata($id)['keterangan']; ?></textarea>
            </td>
        </tr>
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
if ($_POST['submit']) {
    // tambah data jadwal via method
    $jdw->updateJadwal($id, $_POST['id_pelanggan'], $_POST['id_teknisi'], 
            $_POST['id_barang'], $_POST['tipe_pelayanan'], 
            $_POST['status'], $_POST['tanggal'], 
            $_POST['jam'], $_POST['keterangan']);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=jadwal_mgr">';
}
?>
