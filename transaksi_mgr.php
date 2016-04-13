<?php
include_once 'include/class.php';
include_once 'include/lib.php';

//$user = new User();
$nsb = new transaksi();
$jdw = new jadwal();

$iduser = $_SESSION['id'];
if (!$user->get_sesi()) {
    header("location:index.php");
}
?>
<b>DATA TRANSAKSI</b>
<div class="subnav">
    <table border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td><img src="images/tabdata01.gif" /></td>
            <td class="tabsubnav">
                <b>DATA</b><a href="?page=transaksi_add">TAMBAH</a>
            </td>
            <td><img src="images/tabdata03.gif" /></td>
        </tr>
    </table>
</div><br />
<table class="tabholder"  border="0" cellspacing="0" cellpadding="3">
    <tr class="tabhead">
        <td width="40%">
            <form method="post" action="?page=transaksi_mgr" onsubmit="if (this.q.value)
                        return true;
                    else
                        return false;">
                <input type="hidden" name="do" value="lihat" />
                <input name="sb" type="submit" class="button" value="Lihat Semua Data">		  
            </form>
        </td>
        <td width="60%" align="right">
            <form method="post" action="?page=transaksi_mgr" onsubmit="if (this.q.value)
                        return true;
                    else
                        return false;">
                <input type="hidden" name="do" value="find" /><b>Cari ID Transaksi &nbsp; : &nbsp;</b>		  
                <input class="tfield"  type="text" name="q" title="Masukkan kata kunci pencarian." />&nbsp;&nbsp;
                <input name="submit" type="submit" class="button" value="Cari" />
            </form>
        </td>
    </tr>
</table>
<br>
<table class="tabholder" border="0" cellspacing="1" cellpadding="0">
    <tr class="tabhead">
        <td align="center" class="tabtxt">ID Transaksi</td>
        <td align="center" class="tabtxt">ID Jadwal</td>
        <td align="center" class="tabtxt">Jumlah Pembayaran</td>
        <td align="center" class="tabtxt">Status</td>
        <td align="center" class="tabtxt">Last Update</td>
        <td align="center" width="70" class="tabtxt">Aksi</td>
    </tr>
    <?php
//Tampilkan semua transaksi
    $arraytransaksi = $nsb->tampilTransaksi();

//tampilkan semua lewat tombol lihat semua
    if ($_POST['do'] == 'lihat') {
        $arraytransaksi = $nsb->tampilTransaksi();
    }
//tampilkan berdasarkan filter nama
    elseif ($_POST['do'] == 'find') {
        $arraytransaksi = $nsb->searchtransaksi($_POST['q']);
    }

    if (count($arraytransaksi)) {
        foreach ($arraytransaksi as $data) {
            ?>
            <tr class="tabcont">
                <td class="tabtxt" align="center"><?php echo $data['id_transaksi'] ?></td>
                <td class="tabtxt" align="center"><?php echo $data['id_jadwal']; ?></td>
                <td class="tabtxt" align="center"><?php echo $data['jum_pembayaran']; ?></td>
                <td class="tabtxt" align="center"><?php echo $data['status']; ?></td>
                <td class="tabtxt" align="center"><?php echo $data['last_update']; ?></td>
                <td align="left">
                    <div class="tabtxt imghref">
                        <span class="dashnav">&nbsp;</span>
                        <a href="?page=transaksi_edit&aksi=edit&id_transaksi=<?php echo $data['id_transaksi']; ?>">
                            <img src="images/ico_edit.gif" class="ico" border="0" title="Edit" />
                        </a>
                        <span class="dashnav">&nbsp;</span>
                        <a href="?page=transaksi_edit&aksi=hapus&id_transaksi=<?php echo $data['id_transaksi']; ?>">
                            <img src="images/ico_del.gif" class="ico" border="0" title="Hapus" onClick="return confirm('Apakah Anda Yakin?');"/>
                        </a>
                    </div>
                </td>
            </tr>
            <?php
        }
    } else {
        echo 'Transaksi Tidak Ada!';
    }
    ?>
</table>
</p>
<img src="images/ico_edit.gif" border="0" title="Edit" /> = Edit transaksi &nbsp;&nbsp;			
<img src="images/ico_del.gif" border="0" title="Delete" /> = Hapus transaksi			