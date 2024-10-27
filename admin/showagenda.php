<?php
// Cek apakah session sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../koneksi.php";

// Query untuk mengambil data agenda
$lihat = mysqli_query($koneksi, "SELECT * FROM agenda ORDER BY id DESC");

// Cek apakah query berhasil
if (!$lihat) {
    die("Gagal mengambil data agenda: " . mysqli_error($koneksi));
}

$i = 0;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:auto; text-wrap:normal">
  <tr>
    <td width="2%" align="center" bgcolor="#FF6600">No</td>
    <td width="15%" align="center" bgcolor="#FF6600">Hari</td>
    <td width="12%" align="center" bgcolor="#FF6600">Waktu</td>
     <td width="17%" align="center" bgcolor="#FF6600">Judul</td>
      <td width="16%" align="center" bgcolor="#FF6600">Lokasi</td>
       <td width="18%" align="center" bgcolor="#FF6600">Keterangan</td>
     <td colspan="2" align="center" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <?php 
  while($low=mysqli_fetch_array($lihat)){
$i++;
  ?>
  <tr>
    <td style=" border-bottom-color: #3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$i;?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[1];?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[5];?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[2];?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[4];?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[3];?></td>
   <td width="9%" align="center" style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><a href="index.php?menu=editagenda.php&data=<?=$low[0];?>" class="ngedit">Edit</a>
   </td>
    <td width="11%" align="center" style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><a href="index.php?menu=showagenda.php&data=<?=$low[0];?>&aksi=hapus" class="ngedit">Hapus</a></td>
  </tr>
  <?php } ?>
</table>
<?php
// Pastikan variabel $aksi didefinisikan sebelum digunakan
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

if ($aksi == "hapus") {
    // Proses penghapusan
    echo "Proses penghapusan data akan dilakukan di sini.";
} else {
    // Aksi lain atau tidak ada aksi
    echo "Tidak ada aksi yang dipilih.";
?>

<p>
<div style="border-color:#F00; background-color:#CF9; border-style: dotted; padding-top:10px; padding-left:10px; padding-bottom:10px">
    <?php
    // Jika menggunakan mysqli, gunakan mysqli_free_result()
    // mysqli_free_result($Recordset1);

    // Pengecekan apakah variabel $aksi terdefinisi dan bernilai "sukses"
    if (isset($aksi) && $aksi == "sukses") {
        echo "Sukses menambah data";
    }
    ?>
</div>
<?php
}
?>
