<?php
class Database{
		private $dbHost="localhost";
		private $dbUser="root";
		private $dbPass="";
		private $dbName="angsuran";

		function connectMySQL() {
		mysql_connect($this->dbHost, $this->dbUser, $this->dbPass);
		mysql_select_db($this->dbName) or die ("Database Tidak Ditemukan di Server"); 
		}
	}
class User {
		// proses login
		function cek_login($user, $password) {
		$password = md5($password);
		$result = mysql_query("SELECT * FROM admin WHERE user='$user' AND password='$password'");
		$user_data = mysql_fetch_array($result);
		$no_rows = mysql_num_rows($result);
		if ($no_rows == 1) {
			$_SESSION['login'] = TRUE;
			$_SESSION['id'] = $user_data['id'];
			return TRUE;
		}
		else {
		  return FALSE;
		}
	}
	// Ambil Sesi 
	function get_sesi() {
		return $_SESSION['login'];
	}
	
	// Logout 
	function user_logout() {
		$_SESSION['login'] = FALSE;
		session_destroy();
		}
	}	
class customer{
	function tampilcust()
	{
		$query = mysql_query("SELECT * FROM customer");
		while($row=mysql_fetch_array($query))
		$data[]=$row;
		return $data;
		
	}
	function searchcust($keyword)
	{
		$query=mysql_query("select * from customer where nama like '%$keyword%'");
			while($row=mysql_fetch_array($query))
				$data[]=$row;
				return $data;
	}
	function tambahData($id_cust, $nama, $alamat, $ktp, $tmpt_lahir, $tgl, $tlp) {
		$query = "INSERT INTO customer (id_cust, nama, alamat, ktp, tempat_lahir, tanggal_lahir, telepon)
		          VALUES ('$id_cust', '$nama', '$alamat', '$ktp', '$tmpt_lahir', '$tgl', '$tlp')";
		$hasil = mysql_query($query); 
	}
	function hapuscust($id_cust) {
		$query = mysql_query("DELETE FROM customer WHERE id_cust = '$id_cust'");
		echo "Data Customer ID ".$id_cust." sudah di hapus";
	}
	function bacadata($field, $id_cust)
	{
		$query=mysql_query("SELECT * FROM customer WHERE id_cust = '$id_cust'");
		$data=mysql_fetch_array($query);
		if ($field == 'id_cust') return $data['id_cust'];
		else if ($field == 'nama') return $data['nama'];
		else if ($field == 'alamat') return $data['alamat'];
		else if ($field == 'ktp') return $data['ktp'];
		else if ($field == 'tempat_lahir') return $data['tempat_lahir'];
		else if ($field == 'tanggal_lahir') return $data['tanggal_lahir'];
		else if ($field == 'telepon') return $data['telepon'];
	}
	function updatecust($id_cust, $nama, $alamat, $ktp, $tmpt_lahir, $tgl, $telp) 
	{
		$query = "UPDATE customer SET nama = '$nama',
		alamat = '$alamat', ktp = '$ktp', tempat_lahir = '$tmpt_lahir',
		tanggal_lahir = ' $tgl', telepon = '$telp' WHERE id_cust = '$id_cust'";
		$hasil = mysql_query($query);
		//echo "id= ".$id_cust." nama= ".$nama." ktp= ".$ktp." tmpt_lhr = ".$tmpt_lahir." tgl= ".$tgl." alamat = ".$alamat." telp = ".$telp." itu data";	
		echo "Data customer sudah di update";	
	}
}

class sales{
	function tampilsales()
	{
		$query = mysql_query("SELECT * FROM sales");
		while($row=mysql_fetch_array($query))
		$data[]=$row;
		return $data;
		
	}
	function searchsales($keyword)
	{
	 $query=mysql_query("select * from sales where nama like '%$keyword%'");
	 // $no_rows = mysql_num_rows($query);
		 // if($no_rows==1)
		 // {
			while($row=mysql_fetch_array($query))
			//{
				$data[]=$row;
				return $data;
			//}
		 //}
	}
	function bacadata($field, $id_sls)
	{
		$query=mysql_query("SELECT * FROM sales WHERE id = '$id_sls'");
		$data=mysql_fetch_array($query);
		if ($field == 'id') return $data['id'];
		else if ($field == 'nama') return $data['nama'];
		else if ($field == 'ktp') return $data['ktp'];
		else if ($field == 'tempat_lahir') return $data['tempat_lahir'];
		else if ($field == 'tanggal_lahir') return $data['tanggal_lahir'];
		else if ($field == 'alamat') return $data['alamat'];
		else if ($field == 'telepon') return $data['telepon'];
	}
	
	// method untuk proses update data sales
	function updatedata($id_sls, $nama, $ktp, $tmpt_lahir, $tgl, $alamat, $telpon) 
	{
		$query = mysql_query("UPDATE sales SET nama = '$nama', ktp = '$ktp', tempat_lahir = '$tmpt_lahir', tanggal_lahir = '$tgl', alamat = '$alamat', telepon = '$telpon' WHERE id = '$id_sls'");
		echo "Data Sales sudah di update";	
	}
	function tambahData($id_sls, $nama, $ktp, $tmpt_lahir, $tgl, $alamat, $telpon) {
		//$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
		$query = "INSERT INTO sales (id, nama, ktp, tempat_lahir, tanggal_lahir, alamat, telepon)
		          VALUES ('$id_sls', '$nama', '$ktp', '$tmpt_lahir', '$tgl', '$alamat', '$telpon')";
		$hasil = mysql_query($query); 
	}
	function hapussales($id_sls) {
		$query = mysql_query("DELETE FROM sales WHERE id = '$id_sls'");
		echo "Data Sales ID ".$id_sls." sudah di hapus";
	}
}
class angsur
{
	function searchtrans($keyword)
	{
		$query=mysql_query("select * from transaksi inner join customer on transaksi.id_cust=customer.id_cust where nama like '%$keyword%'");
			while($row=mysql_fetch_array($query))
				$data[]=$row;
				return $data;
	}
	
	function combomerek()
	{
		$merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
		while($m=mysql_fetch_array($merek)){
		echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
		}
	}
	function combobarang()
	{
		$barang = mysql_query("SELECT * FROM barang ORDER BY nama_barang");
		while($m=mysql_fetch_array($merek)){
		echo "<option value=\"$m[id_barang]\">$m[nama_barang]</option>\n";
		}
	}
	function combonmc()
	{
		$query = mysql_query("SELECT id_cust, nama FROM customer");
		while($row=mysql_fetch_array($query))
		$data[]=$row;
		return $data;
	}
	function ambilnama($id_cust)
	{
		$query = mysql_query("SELECT * FROM customer WHERE id_cust='$id_cust'");
		$row = mysql_fetch_array($query);
		echo $row['nama'];
	}
	function hapustransaksi($id_trans)
	{
		$query = mysql_query("DELETE FROM transaksi WHERE id_trans = '$id_trans'");
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=detail_mgr">'; 
	}
	function tambahData($id_trans, $id_cust, $barang, $dp, $tgl_trans) {
		//$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
		$query = "INSERT INTO transaksi (id_trans, id_cust, nama_barang, dp, tgl_trans)
		          VALUES ('$id_trans', '$id_cust', '$barang', '$dp', '$tgl_trans')";
		$hasil = mysql_query($query); 
	}
	
	function tampiltrans()
	{
		$query = mysql_query("SELECT * FROM transaksi");
		while($row=mysql_fetch_array($query))
		$data[]=$row;
		return $data;
		
	}
	function jatuhtempo($id_cust)
	{
		$query = mysql_query("SELECT tgl_trans FROM TRANSAKSI WHERE id_cust='$id_cust'");
		$row=mysql_fetch_array($query);
		$tempo=substr($row['tgl_trans'],8,2);
		echo $tempo;
	}
	function bacatransaksi($field, $id_trans)
	{
		$query=mysql_query("SELECT distinct * FROM transaksi INNER JOIN customer ON customer.id_cust = transaksi.id_cust INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang where transaksi.id_trans= '$id_trans'");
		$data=mysql_fetch_array($query);
		$selisih = ($data['harga'] - $data['dp']);
		if ($field == 'id_barang') return $data['id_barang'];
		else if ($field == 'id_trans') return $data['id_trans'];
		else if ($field == 'nama') return $data['nama'];
		else if ($field == 'nama_barang') return $data['nama_barang'];
		else if ($field == 'harga') return $data['harga'];
	    else if ($field == 'id_merek') return $data['id_merek'];
		 else if ($field == 'dp') return $data['dp'];
		  else if ($field == 'selisih') return $selisih;
	}
	function cariAngsuran($id_trans)
	{
		$query=mysql_query("SELECT * FROM transaksi INNER JOIN customer ON customer.id_cust = transaksi.id_cust INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang = '$id_trans'");
		
	}
	
	function bayar($id_trans,$selisih,$tgl_bayar)
	{
	
	//echo "id= ".$selisih."";
	//echo "id= ".$id_trans." harus_dibayar= ".$selisih." tgl= ".$tgl_bayar." itu data";
	$query=mysql_query("Update transaksi set jmlbayar = $selisih, tgl_bayar='$tgl_bayar', flag_bayar = '1' where id_trans = '$id_trans'");
    echo "LUNAS";	
	}
}
class barang
{
	function tambahBarang($id, $merek, $barang, $harga) {
		//$choice = mysql_real_escape_string($_REQUEST['mydropdown']);
		$query = "INSERT INTO barang (id_barang, id_merek, nama_barang, harga)
		          VALUES ('$id', '$merek', '$barang', '$harga')";
		$hasil = mysql_query($query); 
	}
	function combomerek()
	{
		$merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
		while($m=mysql_fetch_array($merek)){
		echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
		}
	}
	function combomerekEdit($id)
	{
		$merek = mysql_query("SELECT * FROM merek ORDER BY n_merek");
		while($m=mysql_fetch_array($merek)){
		echo "<option value=\"$m[id_merek]\">$m[n_merek]</option>\n";
		}
	}
	
	function tampilbarang()
	{
		$query = mysql_query("SELECT * FROM barang");
		while($row=mysql_fetch_array($query))
		$data[]=$row;
		return $data;
		
	}
	function ambilmerek($id_merek)
	{
		$query = mysql_query("SELECT * FROM merek WHERE id_merek='$id_merek'");
		$row = mysql_fetch_array($query);
		echo $row['n_merek'];
	}
	function searchbarang($keyword)
	{
		$query=mysql_query("select * from barang where nama_barang like '%$keyword%'");
			while($row=mysql_fetch_array($query))
				$data[]=$row;
				return $data;
	}
	function bacadata($field, $id_barang)
	{
		$query=mysql_query("SELECT * FROM barang join merek on barang.id_merek=merek.id_merek WHERE id_barang = '$id_barang'");
		$data=mysql_fetch_array($query);
		if ($field == 'id_barang') return $data['id_barang'];
		else if ($field == 'id_trans') return $data['id_trans'];
		else if ($field == 'nama_barang') return $data['nama_barang'];
		else if ($field == 'harga') return $data['harga'];
	    else if ($field == 'id_merek') return $data['id_merek'];
	}
	function bacatransaksi($field, $id_trans)
	{
		$query=mysql_query("SELECT * FROM transaksi INNER JOIN customer ON customer.id_cust = transaksi.id_cust INNER JOIN barang ON barang.nama_barang = transaksi.nama_barang = '$id'");
		$data=mysql_fetch_array($query);
		if ($field == 'id_barang') return $data['id_barang'];
		else if ($field == 'id_trans') return $data['id_trans'];
		else if ($field == 'nama') return $data['nama'];
		else if ($field == 'nama_barang') return $data['nama_barang'];
		else if ($field == 'harga') return $data['harga'];
	    else if ($field == 'id_merek') return $data['id_merek'];
	}
	function updatedata($id, $merek, $nb, $harga)
	{
		$query = mysql_query("UPDATE barang SET id_merek = '$merek', nama_barang = '$nb', harga = '$harga' where id_barang='$id'");
		echo "Data Barang sudah di update";	
	}
	function hapusbarang($id_barang)
	{
		$query = mysql_query("DELETE FROM barang WHERE id_barang = '$id_barang'");
		 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=barang_mgr">'; 
	}
	
}
?>