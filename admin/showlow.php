<?php
// Cek apakah session sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "../koneksi.php";

// Query untuk mengambil data lowongan
$lihat = mysqli_query($koneksi, "SELECT * FROM lowongan ORDER BY id DESC");

// Cek apakah query berhasil
if (!$lihat) {
    die("Gagal mengambil data lowongan: " . mysqli_error($koneksi));
}

$i = 0;
?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="4%" align="center" bgcolor="#FF6600">No</td>
    <td width="35%" align="center" bgcolor="#FF6600">Informasi</td>
    <td width="29%" align="center" bgcolor="#FF6600">Keterangan</td>
     <td colspan="2" align="center" bgcolor="#FF6600">&nbsp;</td>
  </tr>
  <?php 
  while($low=mysqli_fetch_array($lihat)){
$i++;
  ?>
  <tr>
    <td style=" border-bottom-color: #3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$i;?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[2];?></td>
    <td style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><?=$low[3];?></td>
    <td width="17%" align="center" style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><a href="index.php?menu=editlow.php&data=<?=$low[0];?>" class="ngedit">Edit</a></td>
    <td width="15%" align="center" style=" border-bottom-color:#3C0; border-top-color:#FFF;border-left-color:#FFF;  border-right-color:#FFF; border-style: dotted"><a href="index.php?menu=showlow.php&data=<?=$low[0];?>&aksi=hapus" class="ngedit">Hapus</a></td>
  </tr>
  <?php } ?>
</table>
<?php
// Pastikan bahwa variabel $aksi sudah didefinisikan sebelum digunakan
if (isset($aksi) && $aksi == "hapus") {
    // Lakukan aksi penghapusan di sini
    // Contoh: echo "Data akan dihapus!";
    ?>
    <p>Proses penghapusan akan dilakukan di sini.</p>
    <?php
} else {
    // Jika $aksi tidak didefinisikan atau bukan "hapus", lakukan tindakan yang sesuai
    echo "<p>Aksi tidak valid atau tidak ada aksi yang dipilih.</p>";
?>
    <p>
 <div style="border-color:#F00; background-color:#CF9; border-style: dotted; padding-top:10px; padding-left:10px; padding-bottom:10px" > 
    <?php
// Validasi variabel GET 'data' untuk menghindari SQL Injection
if (isset($_GET['data']) && is_numeric($_GET['data'])) {
  // Sanitasi input dari URL
  $data_id = intval($_GET['data']); // Pastikan bahwa data adalah integer

  // Jalankan query dengan menggunakan id yang sudah divalidasi
  $lihat = mysqli_query($koneksi, "SELECT * FROM lowongan WHERE id = $data_id");

  // Periksa apakah data ditemukan
  if ($lihat && mysqli_num_rows($lihat) > 0) {
      // Ambil data hasil query
      $hps = mysqli_fetch_array($lihat, MYSQLI_ASSOC); // Mengambil hasil sebagai array asosiatif

      // Lakukan aksi pada data yang diambil
      // Contoh: echo "Judul Lowongan: " . $hps['judul'];
  } else {
      // Jika tidak ada data yang ditemukan
      echo "Data tidak ditemukan.";
  }
} else {
  // Jika 'data' tidak ada atau tidak valid
  echo "ID data tidak valid.";
}
	
if (isset($_GET['data']) && is_numeric($_GET['data'])) {
  // Sanitasi input dari URL
  $data_id = intval($_GET['data']); // Pastikan bahwa data adalah integer

  // Jalankan query untuk mengambil data
  $lihat = mysqli_query($koneksi, "SELECT * FROM lowongan WHERE id = $data_id");

  // Periksa apakah data ditemukan
  if ($lihat && mysqli_num_rows($lihat) > 0) {
      // Ambil data hasil query
      $hps = mysqli_fetch_array($lihat, MYSQLI_ASSOC); // Mengambil hasil sebagai array asosiatif

      // Tampilkan pesan konfirmasi penghapusan
      echo "Yakin akan menghapus data <b>" . htmlspecialchars($hps['kolom_nama']) . "</b>?"; 
      // Gantilah 'kolom_nama' dengan nama kolom yang sesuai dari tabel Anda (misalnya 'judul' atau nama field lainnya)

      // Tombol konfirmasi hapus
      echo "<center><p> <a href='index.php?menu=showlow.php&uhui=ya&id=" . intval($_GET['data']) . "' class='tabel'>[YA]</a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp; <a href='index.php?menu=showlow.php' class='tabel'>[TIDAK]</a></center>";
  } else {
      // Jika data tidak ditemukan
      echo "Data tidak ditemukan.";
  }
} else {
  // Jika 'data' tidak ada atau tidak valid
  echo "ID data tidak valid.";
}

	
}
if (isset($_GET['uhui']) && $_GET['uhui'] == "ya" && isset($_GET['id']) && is_numeric($_GET['id'])) {
  // Sanitasi ID dengan memastikan bahwa 'id' adalah integer
  $id = intval($_GET['id']);

  // Jalankan query penghapusan data dengan ID yang telah disanitasi
  $sql = mysqli_query($koneksi, "DELETE FROM lowongan WHERE id = $id");

  // Cek apakah query berhasil dijalankan
  if ($sql) {
      // Redirect ke halaman 'showlow.php' setelah penghapusan berhasil
      echo "<meta http-equiv=\"refresh\" content=\"0;url=index.php?menu=showlow.php\">";
      // Alternatif: header("Location: index.php?menu=showlow.php"); die();
  } else {
      // Tampilkan pesan error jika query gagal
      echo "Penghapusan data gagal.";
  }
} else {
  // Jika parameter tidak valid, tampilkan pesan error
  echo "Parameter tidak valid.";
}


?></div>