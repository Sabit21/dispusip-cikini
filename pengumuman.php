<?php
include "koneksi.php";
$cari=mysqli_query($koneksi,"select * from pengumuman where id=1");
$isi=mysqli_fetch_array($cari);


?>
<?php if(!empty($isi[1])){ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><marquee direction="left" scrolldelay="100"><font color="#FFCC00" face="Tahoma, Geneva, sans-serif" size="4"><img src="img/alert.png" width="33" height="28" />&nbsp;&nbsp;<?=$isi[1];?></font></marquee></td>
  </tr>
</table>
<?php } ?>

