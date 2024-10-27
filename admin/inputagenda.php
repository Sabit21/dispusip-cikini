<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require_once('../Connections/konek.php'); // Sambungan ke database

// Fungsi untuk membersihkan input SQL berdasarkan tipe data
if (!function_exists("GetSQLValueString")) {
  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") {
    global $konek; // Pastikan koneksi database tersedia

    // Escape value jika PHP versi lebih baru
    $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($konek, $theValue) : mysqli_escape_string($konek, $theValue);

    switch ($theType) {
      case "text":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;    
      case "long":
      case "int":
        $theValue = ($theValue != "") ? intval($theValue) : "NULL";
        break;
      case "double":
        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
        break;
      case "date":
        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
        break;
      case "defined":
        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
        break;
    }
    return $theValue;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// Proses insert ke database jika form dikirim
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO agenda (id, hari, judul, keterangan, lokasi, waktu) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id'], "int"),
                       GetSQLValueString($_POST['hari'], "text"),
                       GetSQLValueString($_POST['judul'], "text"),
                       GetSQLValueString($_POST['keterangan'], "text"),
                       GetSQLValueString($_POST['lokasi'], "text"),
                       GetSQLValueString($_POST['waktu'], "text"));

  // Pilih database dan jalankan query insert
  mysqli_select_db($konek, $database_konek);
  $Result1 = mysqli_query($konek, $insertSQL) or die(mysqli_error($konek));

  // Redirect setelah sukses
  if($Result1){
    $insertGoTo = "index.php?menu=inputagenda.php&aksi=sukses";
    echo("<meta http-equiv=\"refresh\" content=\"0;url=$insertGoTo\">");
  }
}

// Query untuk mendapatkan semua data agenda
$query_Recordset1 = "SELECT * FROM agenda";
$Recordset1 = mysqli_query($konek, $query_Recordset1) or die(mysqli_error($konek));
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="left" width="100%">
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Hari</td>
      <td align="left"><input type="text" name="hari" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Judul</td>
      <td align="left"><input type="text" name="judul" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Keterangan</td>
      <td align="left"><textarea name="keterangan" rows="5" cols="50"></textarea></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Lokasi</td>
      <td align="left"><input type="text" name="lokasi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="left">Waktu</td>
      <td align="left"><input type="text" name="waktu" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Tambah Data" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
// Jika menggunakan mysqli, gunakan mysqli_free_result()
// mysqli_free_result($Recordset1);

// Pengecekan apakah variabel $aksi terdefinisi dan bernilai "sukses"
if (isset($aksi) && $aksi == "sukses") {
    echo "Sukses menambah data";
}
?>