<?php include "../koneksi.php";
$qbg=mysqli_query($koneksi,"select warna from warnabg where id=1");
$bg=mysqli_fetch_array($qbg);
echo "Warna sekarang adalah #$bg[0], preview";
?>
<table width="400" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
  <tr>
    <td bgcolor="<?=$bg[0];?>" height="100" align="center">Sample teks</td>
  </tr>
</table>
<h3>Untuk mengubah warna background klik ambil warna berikut</h3><br />
<script src="jscolor.js"></script>
<form name="ambilwarna" method="post" action="index.php?menu=ubahbg.php&aksi=kirim" enctype="multipart/form-data">
Ambil warna: <input name="warna" class="jscolor" value="ab2567">
<input type="submit" value="Pilih warna">
</form>
<?php
if($aksi=="kirim"){
include "../koneksi.php";
	echo "Warna dipilih=$_POST[warna]";
	$query=mysqli_query($koneksi,"update warnabg set warna='$_POST[warna]' where id=1");

if($query)  echo("<meta http-equiv=\"refresh\" content=\"0;url=index.php?menu=ubahbg.php\">");
}

?>

