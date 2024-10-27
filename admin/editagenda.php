<?php
include "../koneksi.php";

// Cek apakah aksi bukan "kirim"
if (isset($_GET['aksi']) && $_GET['aksi'] != "kirim" && isset($_GET['data'])) {
    $idAgenda = intval($_GET['data']); // Menghindari SQL injection dengan intval
    $sqlku = mysqli_query($koneksi, "SELECT * FROM agenda WHERE id=$idAgenda");
    $data = mysqli_fetch_array($sqlku);
}
?>

<form name="inputnews" action="index.php?menu=editagenda.php&aksi=kirim" enctype="multipart/form-data" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr valign="baseline">
            <td nowrap="nowrap" align="left"><label for="hari">Hari</label></td>
            <td align="left"><input type="text" id="hari" name="hari" value="<?= htmlspecialchars($data['hari']); ?>" size="32" required /></td>
        </tr>

        <tr valign="baseline">
            <td nowrap="nowrap" align="left"><label for="judul">Judul</label></td>
            <td align="left"><input type="text" id="judul" name="judul" value="<?= htmlspecialchars($data['judul']); ?>" size="32" required /></td>
        </tr>

        <tr valign="baseline">
            <td nowrap="nowrap" align="left"><label for="keterangan">Keterangan</label></td>
            <td align="left"><textarea id="keterangan" name="keterangan" rows="5" cols="50" required><?= htmlspecialchars($data['keterangan']); ?></textarea></td>
        </tr>

        <tr valign="baseline">
            <td nowrap="nowrap" align="left"><label for="lokasi">Lokasi</label></td>
            <td align="left"><input type="text" id="lokasi" name="lokasi" value="<?= htmlspecialchars($data['lokasi']); ?>" size="32" required /></td>
        </tr>

        <tr valign="baseline">
            <td nowrap="nowrap" align="left"><label for="waktu">Waktu</label></td>
            <td align="left"><input type="text" id="waktu" name="waktu" value="<?= htmlspecialchars($data['waktu']); ?>" size="32" required /></td>
        </tr>
    </table>

    <input type="hidden" value="<?= htmlspecialchars($data['id']); ?>" name="id" />
    <input name="kirim" type="submit" value="Kirim" />
    <input name="reset" type="reset" value="Ulangi" />
</form>

<?php
if (isset($_GET['aksi']) && $_GET['aksi'] == "kirim") {
    // Ambil data dari POST dengan sanitasi
    $hari = mysqli_real_escape_string($koneksi, $_POST['hari']);
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    $id = intval($_POST['id']); // Menghindari SQL injection dengan intval

    // Update query
    $sql = "UPDATE agenda SET hari='$hari', judul='$judul', keterangan='$keterangan', lokasi='$lokasi', waktu='$waktu' WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        echo "Update berhasil";
    } else {
        echo "Error: " . mysqli_error($koneksi); // Menampilkan pesan error yang lebih informatif
    }
}
?>
