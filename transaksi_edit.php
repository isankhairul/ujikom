<?php
include_once 'include/class.php';
include_once 'include/lib.php';

// instance objek user
$user = new User();
$trk = new transaksi();
$jdw = new jadwal();

$id = $_GET['id_transaksi'];
$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
    header("location:index.php");
}

if (isset($_GET['aksi'])) {
    if ($_GET['aksi'] == 'hapus') {
        // proses hapus data customer berdasarkan ID via method
        $trk->hapusTransaksi($id);
    }
}

?>

<b>Transaksi</b>
<div class="subnav">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="images/tabdata01.gif" /></td>
            <td class="tabsubnav">
                <a href="?page=transaksi_mgr">DATA</a> &raquo; <b>Edit Transaksi</b>
            </td>
            <td><img src="images/tabdata03.gif" /></td>
        </tr>
    </table>
</div>		
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
    <form name="transaksi" method="post">      
        <tr>
            <td><div class="tabtxt">ID Transaksi</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="id_transaksi" style="width:200px" class="tfield" readonly="readonly"
                       value="<?php echo $id; ?>">
            </td>
        </tr>
        <tr>
            <td width="15%"><div class="tabtxt">ID Jadwal</div></td>
            <td width="2%"><div class="tabtxt">:</div></td>
            <td width="83%">
                <select name="id_jadwal" id="id_jadwal" required>
                    <?php foreach ($jdw->tampilJadwal() as $item): ?>
                        <option value="<?php echo $item['id_jadwal']; ?>"
                            <?php echo ($trk->bacadata($id)["id_jadwal"] == $item['id_jadwal']) ? "selected" : ''; ?>>
                            <?php echo $item['id_jadwal']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="15%"><div class="tabtxt">Status</div></td>
            <td width="2%"><div class="tabtxt">:</div></td>
            <td width="83%">
                <select name="status" id="status" required>
                    <?php foreach ($jdw->getStatus() as $item): ?>
                        <option value="<?php echo $item; ?>" 
                            <?php echo ($trk->bacadata($id)["status"] == $item) ? "selected" : ''; ?>>
                            <?php echo $item; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><div class="tabtxt">Jumlah Pembayaran</div></td>
            <td><div class="tabtxt">:</div></td>
            <td>
                <input name="jum_pembayaran" style="width:200px" type="number" class="tfield" required
                       value="<?php echo $trk->bacadata($id)["jum_pembayaran"]; ?>">
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
    // tambah data transaksi via method
    //echo "$_POST['nama']";
    $trk->updateTransaksi($id, $_POST['id_jadwal'], $_POST['status'], $_POST['jum_pembayaran']);
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi_mgr">';
}
?>
