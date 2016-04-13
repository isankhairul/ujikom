<?php
include_once 'lib.php';

class Database {

    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPass = "";
    private $dbName = "angsuran";

    function connectMySQL() {
        mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
        mysql_select_db($this->dbName) or die("Database Tidak Ditemukan di Server");
    }

}

class User {

    // proses login
    function cek_login($user, $password) {
        $password = md5($password);
        $result = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) {
            $_SESSION['login'] = TRUE;
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['hak_akses'] = $user_data['hak_akses'];
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    // Ambil Sesi 
    function get_sesi() {
        return (isset($_SESSION['login']) ? $_SESSION['login'] : "");
    }

    // Logout 
    function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
    
    function getListAccessPage(){
        return [
            "admin" => ["teknisi", "pelanggan", "barang", "jadwal", "transaksi"],
            "manager" => ["teknisi", "pelanggan", "barang", "jadwal", "transaksi"],
            "teknisi" => ["teknisi"]
        ];
    }

}

class pelanggan {

    function tampilcust() {
        $query = mysql_query("SELECT * FROM pelanggan");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function searchcust($keyword) {
        $query = mysql_query("select * from pelanggan where nama like '%$keyword%'");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function tambahData($id_pelanggan, $nama, $alamat, $ktp, $tmpt_lahir, $tgl, $tlp) {
        $query = "INSERT INTO pelanggan (id_pelanggan, nama, alamat, ktp, tempat_lahir, tanggal_lahir, telepon)
		          VALUES ('$id_pelanggan', '$nama', '$alamat', '$ktp', '$tmpt_lahir', '$tgl', '$tlp')";
        $hasil = mysql_query($query);
    }

    function hapuscust($id_pelanggan) {
        $query = mysql_query("DELETE FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
        echo "Data Customer ID " . $id_pelanggan . " sudah di hapus";
    }

    function bacadata($field, $id_pelanggan) {
        $query = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'");
        $data = mysql_fetch_array($query);
        if ($field == 'id_pelanggan')
            return $data['id_pelanggan'];
        else if ($field == 'nama')
            return $data['nama'];
        else if ($field == 'alamat')
            return $data['alamat'];
        else if ($field == 'ktp')
            return $data['ktp'];
        else if ($field == 'tempat_lahir')
            return $data['tempat_lahir'];
        else if ($field == 'tanggal_lahir')
            return $data['tanggal_lahir'];
        else if ($field == 'telepon')
            return $data['telepon'];
    }

    function updatecust($id_pelanggan, $nama, $alamat, $ktp, $tmpt_lahir, $tgl, $telp) {
        $query = "UPDATE pelanggan SET nama = '$nama',
		alamat = '$alamat', ktp = '$ktp', tempat_lahir = '$tmpt_lahir',
		tanggal_lahir = ' $tgl', telepon = '$telp' WHERE id_pelanggan = '$id_pelanggan'";
        $hasil = mysql_query($query);
        //echo "id= ".$id_pelanggan." nama= ".$nama." ktp= ".$ktp." tmpt_lhr = ".$tmpt_lahir." tgl= ".$tgl." alamat = ".$alamat." telp = ".$telp." itu data";	
        echo "Data pelanggan sudah di update";
    }

}

class teknisi {

    function tampilteknisi() {
        $query = mysql_query("SELECT * FROM teknisi");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function searchteknisi($keyword) {
        $query = mysql_query("select * from teknisi where nama like '%$keyword%'");
        // $no_rows = mysql_num_rows($query);
        // if($no_rows==1)
        // {
        while ($row = mysql_fetch_array($query))
        //{
            $data[] = $row;
        return $data;
        //}
        //}
    }

    function bacadata($field, $id_sls) {
        $query = mysql_query("SELECT * FROM teknisi WHERE id = '$id_sls'");
        $data = mysql_fetch_array($query);
        if ($field == 'id')
            return $data['id'];
        else if ($field == 'nama')
            return $data['nama'];
        else if ($field == 'ktp')
            return $data['ktp'];
        else if ($field == 'tempat_lahir')
            return $data['tempat_lahir'];
        else if ($field == 'tanggal_lahir')
            return $data['tanggal_lahir'];
        else if ($field == 'alamat')
            return $data['alamat'];
        else if ($field == 'telepon')
            return $data['telepon'];
    }

    // method untuk proses update data teknisi
    function updatedata($id_sls, $nama, $ktp, $tmpt_lahir, $tgl, $alamat, $telpon) {
        $query = mysql_query("UPDATE teknisi SET nama = '$nama', ktp = '$ktp', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl', alamat = '$alamat', telepon = '$telpon' WHERE id = '$id_sls'");
        echo "Data Teknisi sudah di update";
    }

    function tambahData($id_sls, $nama, $ktp, $tmpt_lahir, $tgl, $alamat, $telpon) {
        //$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
        $query = "INSERT INTO teknisi (id, nama, ktp, tempat_lahir, tanggal_lahir, alamat, telepon)
		          VALUES ('$id_sls', '$nama', '$ktp', '$tmpt_lahir', '$tgl', '$alamat', '$telpon')";
        $hasil = mysql_query($query);
    }

    function hapusteknisi($id_sls) {
        $query = mysql_query("DELETE FROM teknisi WHERE id = '$id_sls'");
        echo "Data Teknisi ID " . $id_sls . " sudah di hapus";
    }

}

class angsur {

    function searchtrans($keyword) {
        $query = mysql_query("select * from transaksi inner join pelanggan on transaksi.id_pelanggan=pelanggan.id_pelanggan where nama like '%$keyword%'");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function combomerek() {
        $merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
        while ($m = mysql_fetch_array($merek)) {
            echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
        }
    }

    function combobarang() {
        $barang = mysql_query("SELECT * FROM barang ORDER BY nama_barang");
        while ($m = mysql_fetch_array($merek)) {
            echo "<option value=\"$m[id_barang]\">$m[nama_barang]</option>\n";
        }
    }

    function combonmc() {
        $query = mysql_query("SELECT id_pelanggan, nama FROM pelanggan");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function ambilnama($id_pelanggan) {
        $query = mysql_query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
        $row = mysql_fetch_array($query);
        echo $row['nama'];
    }

    function hapustransaksi($id_trans) {
        $query = mysql_query("DELETE FROM transaksi WHERE id_trans = '$id_trans'");
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=detail_mgr">';
    }

    function tambahData($id_trans, $id_pelanggan, $barang, $dp, $tgl_trans) {
        //$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
        $query = "INSERT INTO transaksi (id_trans, id_pelanggan, nama_barang, dp, tgl_trans)
		          VALUES ('$id_trans', '$id_pelanggan', '$barang', '$dp', '$tgl_trans')";
        $hasil = mysql_query($query);
    }

    function tampiltrans() {
        $query = mysql_query("SELECT * FROM transaksi");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function jatuhtempo($id_pelanggan) {
        $query = mysql_query("SELECT tgl_trans FROM TRANSAKSI WHERE id_pelanggan='$id_pelanggan'");
        $row = mysql_fetch_array($query);
        $tempo = substr($row['tgl_trans'], 8, 2);
        echo $tempo;
    }

    function bacatransaksi($field, $id_trans) {
        $query = mysql_query("SELECT distinct * FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang where transaksi.id_trans= '$id_trans'");
        $data = mysql_fetch_array($query);
        $selisih = ($data['harga'] - $data['dp']);
        if ($field == 'id_barang')
            return $data['id_barang'];
        else if ($field == 'id_trans')
            return $data['id_trans'];
        else if ($field == 'nama')
            return $data['nama'];
        else if ($field == 'nama_barang')
            return $data['nama_barang'];
        else if ($field == 'harga')
            return $data['harga'];
        else if ($field == 'id_merek')
            return $data['id_merek'];
        else if ($field == 'dp')
            return $data['dp'];
        else if ($field == 'selisih')
            return $selisih;
    }

    function cariAngsuran($id_trans) {
        $query = mysql_query("SELECT * FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang = '$id_trans'");
    }

    function bayar($id_trans, $selisih, $tgl_bayar) {

        //echo "id= ".$selisih."";
        //echo "id= ".$id_trans." harus_dibayar= ".$selisih." tgl= ".$tgl_bayar." itu data";
        $query = mysql_query("Update transaksi set jmlbayar = $selisih, tgl_bayar='$tgl_bayar', flag_bayar = '1' where id_trans = '$id_trans'");
        echo "LUNAS";
    }

}

class barang {

    function tambahBarang($id, $merek, $barang, $harga) {
        //$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
        $query = "INSERT INTO barang (id_barang, id_merek, nama_barang, harga)
		          VALUES ('$id', '$merek', '$barang', '$harga')";
        $hasil = mysql_query($query);
    }

    function combomerek() {
        $merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
        while ($m = mysql_fetch_array($merek)) {
            echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
        }
    }

    function combomerekEdit($id) {
        $merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
        while ($m = mysql_fetch_array($merek)) {
            echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
        }
    }

    function tampilbarang() {
        $query = mysql_query("SELECT * FROM barang");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function ambilmerek($id_merek) {
        $query = mysql_query("SELECT * FROM merek WHERE id_merek='$id_merek'");
        $row = mysql_fetch_array($query);
        echo $row['n_merek'];
    }

    function searchbarang($keyword) {
        $query = mysql_query("select * from barang where nama_barang like '%$keyword%'");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function bacadata($field, $id_barang) {
        $query = mysql_query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
        $data = mysql_fetch_array($query);
        if ($field == 'id_barang')
            return $data['id_barang'];
        else if ($field == 'id_trans')
            return $data['id_trans'];
        else if ($field == 'nama_barang')
            return $data['nama_barang'];
        else if ($field == 'harga')
            return $data['harga'];
        else if ($field == 'id_merek')
            return $data['id_merek'];
    }

    function old_bacadata($field, $id_barang) {
        $query = mysql_query("SELECT * FROM barang join merek on barang.id_merek=merek.id_merek WHERE id_barang = '$id_barang'");
        $data = mysql_fetch_array($query);
        if ($field == 'id_barang')
            return $data['id_barang'];
        else if ($field == 'id_trans')
            return $data['id_trans'];
        else if ($field == 'nama_barang')
            return $data['nama_barang'];
        else if ($field == 'harga')
            return $data['harga'];
        else if ($field == 'id_merek')
            return $data['id_merek'];
    }

    function bacatransaksi($field, $id_trans) {
        $query = mysql_query("SELECT * FROM transaksi INNER JOIN pelanggan ON pelanggan.id_pelanggan = transaksi.id_pelanggan INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang = '$id'");
        $data = mysql_fetch_array($query);
        if ($field == 'id_barang')
            return $data['id_barang'];
        else if ($field == 'id_trans')
            return $data['id_trans'];
        else if ($field == 'nama')
            return $data['nama'];
        else if ($field == 'nama_barang')
            return $data['nama_barang'];
        else if ($field == 'harga')
            return $data['harga'];
        else if ($field == 'id_merek')
            return $data['id_merek'];
    }

    function updatedata($id, $merek, $nb, $harga) {
        $query = mysql_query("UPDATE barang SET id_merek = '$merek', nama_barang = '$nb', harga = '$harga' where id_barang='$id'");
        echo "Data Barang sudah di update";
    }

    function hapusbarang($id_barang) {
        $query = mysql_query("DELETE FROM barang WHERE id_barang = '$id_barang'");
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=barang_mgr">';
    }

}

class jadwal {
    
    function getStatus(){
        return ["belum_proses", "proses", "ok"];
    }
            
    function tambahJadwal($id_pelanggan, $id_teknisi, $id_barang, $tipe_pelayanan, $status, $tanggal, $jam, $keterangan) {
        //$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
        $id_jadwal = kdauto("jadwal", "JD");
        $query = "INSERT INTO jadwal (id_jadwal, id_pelanggan, id_teknisi, tipe_pelayanan, tanggal, id_barang, status, jam, keterangan)
		          VALUES ('$id_jadwal' ,'$id_pelanggan', '$id_teknisi', '$tipe_pelayanan', '$tanggal', '$id_barang', '$status', '$jam', '$keterangan')";
        $hasil = mysql_query($query);
    }

    function tampilJadwal() {
        $query = mysql_query("SELECT a.*, b.nama AS nama_pelanggan, c.nama AS nama_teknisi, d.nama_barang
                                FROM jadwal a
                                JOIN pelanggan b ON a.id_pelanggan=b.id_pelanggan
                                JOIN teknisi c ON a.id_teknisi=c.id
                                JOIN barang d ON a.id_barang=d.id_barang;");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }
    
    function tampilJadwalNotOk(){
        $query = mysql_query("SELECT a.*, b.nama AS nama_pelanggan, c.nama AS nama_teknisi, d.nama_barang
                                FROM jadwal a
                                JOIN pelanggan b ON a.id_pelanggan=b.id_pelanggan
                                JOIN teknisi c ON a.id_teknisi=c.id
                                JOIN barang d ON a.id_barang=d.id_barang
                                WHERE a.status <> 'ok';");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }
    
    function searchjadwal($keyword) {
        $query = mysql_query("SELECT a.*, b.nama AS nama_pelanggan, c.nama AS nama_teknisi, d.nama_barang
                                FROM jadwal a
                                JOIN pelanggan b ON a.id_pelanggan=b.id_pelanggan
                                JOIN teknisi c ON a.id_teknisi=c.id
                                JOIN barang d ON a.id_barang=d.id_barang
                                WHERE a.status like '%$keyword%';");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function bacadata($id_jadwal) {
        $query = mysql_query("SELECT * FROM jadwal WHERE id_jadwal = '$id_jadwal'");
        $data = mysql_fetch_array($query);
        return $data;
    }

    function updateJadwal($id, $id_pelanggan, $id_teknisi, $id_barang, $tipe_pelayanan, $status, $tanggal, $jam, $keterangan) {
        $query = mysql_query("UPDATE jadwal SET id_pelanggan = '$id_pelanggan', "
                . "id_teknisi = '$id_teknisi', id_barang = '$id_barang', "
                . "tipe_pelayanan = '$tipe_pelayanan', status = '$status', "
                . "tanggal = '$tanggal', jam = '$jam', keterangan = '$keterangan'"
                . " where id_jadwal='$id'");
        echo "Data Jadwal sudah di update";
    }

    function hapusJadwal($id) {
        $query = mysql_query("DELETE FROM jadwal WHERE id_jadwal = '$id'");
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=jadwal_mgr">';
    }
}

class transaksi {
            
    function tambahTransaksi($id_jadwal, $status, $jum_pembayaran) {
        //$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
        $id_transaksi = kdauto("transaksi", "TR");
        $now = date('Y-m-d H:i:s');
        $query = "INSERT INTO transaksi (id_transaksi, id_jadwal, jum_pembayaran, last_update)
		          VALUES ('$id_transaksi', '$id_jadwal', '$jum_pembayaran', '$now')";
        mysql_query($query);
        $queryUpdateStatus = "UPDATE jadwal SET status = '$status' where id_jadwal = '$id_jadwal'";
        mysql_query($queryUpdateStatus);
    }

    function tampilTransaksi() {
        $query = mysql_query("SELECT a.*, b.status
                                FROM transaksi a
                                JOIN jadwal b ON a.`id_jadwal` = b.`id_jadwal`;");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }
    
    function searchTransaksi($keyword) {
        $query = mysql_query("SELECT * from transaksi
                                WHERE id_transaksi = '$keyword';");
        while ($row = mysql_fetch_array($query))
            $data[] = $row;
        return $data;
    }

    function bacadata($id_transaksi) {
        $query = mysql_query("SELECT a.*, b.status
                                FROM transaksi a
                                JOIN jadwal b ON a.`id_jadwal` = b.`id_jadwal`
                                WHERE a.`id_transaksi` = '$id_transaksi'");
        $data = mysql_fetch_array($query);
        return $data;
    }

    function updateTransaksi($id_transaksi, $id_jadwal, $status, $jum_pembayaran) {
        $now = date('Y-m-d H:i:s');
        mysql_query("UPDATE transaksi SET"
                . " id_jadwal = '$id_jadwal', jum_pembayaran = '$jum_pembayaran', last_update = '$now'"
                . " WHERE id_transaksi='$id_transaksi'");
        mysql_query("UPDATE jadwal SET status = '$status' where id_jadwal = '$id_jadwal'");
        echo "Data Transaksi sudah di update";
    }

    function hapusTransaksi($id) {
        $query = mysql_query("DELETE FROM transaksi WHERE id_transaksi = '$id'");
        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi_mgr">';
    }
}


?>