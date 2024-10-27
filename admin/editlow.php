<?php
include "../koneksi.php";

if (isset($_GET['aksi']) && $_GET['aksi'] != "kirim") {
  // Amankan input 'data' dengan menggunakan prepared statement atau minimal escape string
  $id = mysqli_real_escape_string($koneksi, $_GET['data']);

  // Jalankan query dengan id yang sudah diamankan
  $sqlku = mysqli_query($koneksi, "SELECT * FROM lowongan WHERE id='$id'");
  
  // Pastikan query berhasil dijalankan
  if ($sqlku && mysqli_num_rows($sqlku) > 0) {
      // Ambil data dari hasil query
      $data = mysqli_fetch_array($sqlku);
  } else {
      echo "Data tidak ditemukan atau terjadi kesalahan.";
  }
}
?>

<?php
// Pastikan $data sudah diinisialisasi sebelum digunakan
if (!isset($data)) {
    $data = [
        0 => '', // ID
        1 => '', // Kategori
        2 => '', // Nama Perusahaan
        3 => '', // Lowongan
        4 => '', // Kualifikasi
        5 => '', // Kontak
    ];
}
?>

<form name="inputnews" action="index.php?menu=editlow.php&aksi=kirim" enctype="multipart/form-data" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="23%">Kategori</td>
            <td width="1%">:</td>
            <td width="76%">
                <input name="kategori" type="text" id="kat" size="25" value="<?= htmlspecialchars($data[1], ENT_QUOTES, 'UTF-8'); ?>">
            </td>
        </tr>
        <tr>
            <td>Nama Perusahaan</td>
            <td>:</td>
            <td>
                <input name="nama" type="text" id="kat2" size="50" value="<?= htmlspecialchars($data[2], ENT_QUOTES, 'UTF-8'); ?>">
            </td>
        </tr>
        <tr>
            <td>Lowongan</td>
            <td>:</td>
            <td>
                <input name="lowongan" type="text" id="kat3" size="45" value="<?= htmlspecialchars($data[3], ENT_QUOTES, 'UTF-8'); ?>">
            </td>
        </tr>
        <tr>
            <td>Kualifikasi</td>
            <td>:</td>
            <td>
                <textarea name="kualifikasi" cols="30" rows="5"><?= htmlspecialchars($data[4], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Kontak</td>
            <td>:</td>
            <td>
                <textarea name="kontak" cols="30" rows="5"><?= htmlspecialchars($data[5], ENT_QUOTES, 'UTF-8'); ?></textarea>
            </td>
        </tr>
    </table>
    <input type="hidden" value="<?= htmlspecialchars($data[0], ENT_QUOTES, 'UTF-8'); ?>" name="id" />
    <input name="kirim" type="submit" value="Kirim" />
    <input name="reset" type="reset" value="Ulangi" />
</form>

<?php
if (isset($_GET['aksi']) && $_GET['aksi'] == "kirim") {
    // Amankan input dari form dengan mysqli_real_escape_string
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['kategori']);
    $perusahaan = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $pekerjaan = mysqli_real_escape_string($koneksi, $_POST['lowongan']);
    $syarat = mysqli_real_escape_string($koneksi, $_POST['kualifikasi']);
    $kontak = mysqli_real_escape_string($koneksi, $_POST['kontak']);

    // Query update menggunakan variabel yang sudah disanitasi
    $sql = mysqli_query($koneksi, "UPDATE lowongan 
                                   SET kategori='$kategori', 
                                       perusahaan='$perusahaan', 
                                       pekerjaan='$pekerjaan', 
                                       syarat='$syarat', 
                                       kontak='$kontak' 
                                   WHERE id='$id'");

    // Cek apakah update berhasil
    if ($sql) {
        echo "Update berhasil";
    } else {
        echo "Error: " . mysqli_error($koneksi); // Menampilkan error jika terjadi
    }
}
?>
