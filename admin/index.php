<?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["pass"])) {

?>

<style type="text/css">
.tablesatu {
	padding-left: 30px;
	padding-right: 20px;
	padding-top: 5px;
	padding-bottom: 5px;
}
a.tabel:link{
		color:#F60;
		text-decoration:none;
}
a.tabel:hover{
		color: #FC0;
				text-decoration:underline;

}
a.tabel:visited{
		color:#F60;
				text-decoration:none;

}
a.tabel:active{
		color:#F60;
				text-decoration:none;

}
a.ngedit:link{
		color:#F60;
		text-decoration:none;
}
a.ngedit:hover{
		color: #666;
				text-decoration:underline;

}
a.ngedit:visited{
		color:#F60;
				text-decoration:none;

}
a.ngedit:active{
		color:#F60;
				text-decoration:none;

}


</style>
<?php
if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    // Menggunakan switch untuk menetapkan nilai $anu berdasarkan nilai 'menu'
    switch ($menu) {
        case "inputlow.php":
            $anu = "Input Running Text";
            break;
        case "showlow.php":
            $anu = "Edit Running Text";
            break;
        case "inputpeng.php":
            $anu = "Input Pengumuman";
            break;
        case "editlow.php":
            $anu = "Edit Running Text"; // sudah diperbaiki deskripsinya
            break;
        case "showagenda.php":
            $anu = "Edit Agenda Kadis";
            break;
        case "inputbanner.php":
            $anu = "Input Banner Informasi";
            break;
        case "inputvideo.php":
            $anu = "Input Video";
            break;
        case "showvideo.php":
            $anu = "Edit Video";
            break;
        case "inputagenda.php":
            $anu = "Input Agenda Kadis";
            break;
        case "showbanner.php":
            $anu = "Edit Banner Informasi";
            break;
        case "ubahgbrbg.php":
            $anu = "Ubah Gambar Background Utama";
            break;
        case "ubahbg.php":
            $anu = "Ubah Warna Background Jadwal KADIS";
            break;
    }
} else {
    $menu = ""; // Jika 'menu' tidak didefinisikan, set $menu ke string kosong
}
?>

<title>Admin Page</title>

<table width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <td width="21%">&nbsp;</td>
        <td width="62%" align="center" valign="middle">
            <img src="../img/admintop1.jpg" width="300" height="100" />
        </td>
        <td width="17%">&nbsp;</td>
    </tr>
    <tr>
        <td valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        <img src="../img/admin.jpg" width="" height="" />
                    </td>
                </tr>
                <!-- Daftar menu admin -->
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=inputlow.php" class="tabel"> Input Informasi (Running text)</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=showlow.php" class="tabel"> Edit Running Text</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" alt="" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=inputagenda.php" class="tabel"> Input Agenda Kadis</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" alt="" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=showagenda.php" class="tabel"> Edit Agenda Kadis</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" alt="" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=inputbanner.php" class="tabel"> Input Banner Kanan</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" alt="" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=showbanner.php" class="tabel"> Edit Banner Kanan</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="index.php?menu=inputpeng.php" class="tabel"> Input Pengumuman</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="cetak.php" class="tabel"> Cetak</a>
                    </td>
                </tr>
                <tr>
                    <td class="tablesatu">
                        <img src="../img/left.JPG" width="10" height="10" style="alignment-adjust: middle;" />
                        <a href="logout.php" class="tabel"> Logout</a>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </td>
        <td valign="top" style="padding: 30px;">
            <?php 
            echo "<h2>$anu</h2>";
            if (!empty($menu)) {
                include $menu;
            } else {
                echo "<h2>Selamat datang admin, gunakan menu di sebelah kiri untuk administrasi</h2>";
            }
            ?>
        </td>
    </tr>
</table>
<?php 
// Jika sudah ada blok pembuka untuk kondisi lain, pastikan kurung tutup berada sebelum else
} else {
    echo "<div style='border-color:#F00; background-color:#CF9; border-style: dotted; padding-top:10px; padding-left:10px; padding-bottom:10px' align='center'>";
    echo "<h2>Anda tidak diperkenankan melihat halaman ini, silahkan login terlebih dahulu!</h2>";
    echo "<br><a href='login.php'>Klik disini untuk LOGIN</a>";
    echo "</div><br>";
}
?>

