<?php
session_start();
include_once 'include/class.php';

//instance objek db dan user
$user = new User();
$db = new Database();

//koneksi ke database
$db->connectMYSQL();

//cek user sudah login atau belum
if ($user->get_sesi()) {
    header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $user->cek_login($_POST['username'], $_POST['passwd']);
    if ($login) {
        // login sukses, arahkan ke file admin.php
        header("location:admin.php");
    } else {
        //login gagal beri pesan error
        ?>
        <script language ="javascript">
            alert("maaf, Username atau Passowrd Anda salah");
            document.location = "index.php";
        </script>
        <?php
    }
}
?>
<html>
    <head>
        <title>SISTEM INFORMASI PENJUALAN</title>
        <link href="css/login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div style="margin: 50px auto;">
            <div class="login1">
                <h3 class="h3">LOGIN SISTEM</h3>
                <br />
                <form method="post" name="login">
                    <div><input name="username" placeholder="usernme" title="username" value="" id="textbox"></div><br />
                    <div><input type="password" placeholder="password" name="passwd" title="Password" value="" id="textbox"></div>
                    <br />
                    <div><input type="submit" name="submit" id="submit" value="LOGIN"></div>
                </form>
            </div>
        </div>
    </body>
</html>