<form name="frmlogin" method="post" enctype="multipart/form-data" action="login.php?aksi=login">
<table width="100%" border="0" cellspacing="0" cellpadding="3" style="border-color:#C60; background-color:#CF9; border-style: dotted; padding-top:10px; padding-left:10px; padding-bottom:10px" align='center'>
  <tr>
    <td width="18%">Username</td>
    <td width="1%">:</td>
    <td width="81%">
      <input name="username" type="text" size="25" required>
      *harus diisi
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
      <input name="password" type="password" size="25" required> 
      *harus diisi
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <input type="submit" value="Login" name="submit" style="background-color:#F90; color:#FFF">
    </td>
  </tr>
</table>
</form>

<?php
if (isset($_GET['aksi']) && $_GET['aksi'] == "login") {
    // Cek apakah input kosong
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "Kesalahan: silahkan masukkan username dan password anda<br>";
    } else {
        // Escape input untuk menghindari injeksi
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        
        // Contoh login sederhana (dengan hard-coded username dan password)
        if ($username == "admin" && $password == "dispusip") {
            session_start();
            $_SESSION['user'] = $username;
            $_SESSION['pass'] = $password;
            
            echo "Username anda: " . $_SESSION['user'] . "<br>";
            echo "Password anda: " . $_SESSION['pass'] . "<br>";
            echo "Login success, Loading....";
            
            // Redirect ke halaman index.php
            echo "<meta http-equiv=\"refresh\" content=\"1;url=index.php\">";
        } else {
            echo "Username dan password anda salah";
        }
    }
}
?>
