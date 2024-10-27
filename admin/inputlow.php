<form name="inputnews" action="index.php?menu=inputlow.php&aksi=kirim" enctype="multipart/form-data" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="23%" valign="top">Judul Informasi</td>
    <td width="1%" valign="top">:</td>
    <td width="76%" valign="top"><input name="nama" type="text" id="kat2" size="50"></td>
  </tr>
  <tr>
    <td valign="top">Keterangan</td>
    <td valign="top">:</td>
    <td valign="top"><textarea name="lowongan" cols="50" rows="5"></textarea></td>
  </tr>
</table>
<input name="kirim" type="submit" value="Kirim" />
<input name="reset" type="reset" value="Ulangi" />
</form>
<?php
include "../koneksi.php";

if (isset($_GET['aksi']) && $_GET['aksi'] == "kirim") {
    // Ambil data dari POST dan validasi input
    $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $lowongan = isset($_POST['lowongan']) ? $_POST['lowongan'] : '';
    $kualifikasi = isset($_POST['kualifikasi']) ? $_POST['kualifikasi'] : '';
    $kontak = isset($_POST['kontak']) ? $_POST['kontak'] : '';

    // Persiapkan statement untuk menghindari SQL Injection
    $stmt = $koneksi->prepare("INSERT INTO lowongan (kategori, perusahaan, pekerjaan, syarat, kontak) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $kategori, $nama, $lowongan, $kualifikasi, $kontak);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        echo "Input data berhasil";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement
    $stmt->close();


// Tutup koneksi
$koneksi->close();


	
}




?>