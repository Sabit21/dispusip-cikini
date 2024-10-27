<meta http-equiv="refresh" content="3000"><?php
include "koneksi.php";



//tampil lowongan scrolling
$low=mysqli_query($koneksi,"select * from lowongan order by id DESC");

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
 <tr align="center" bgcolor="#F05205" valign="middle">
   <td bgcolor="#333333" width="271"><font size=5 color=yellow>Informasi</font><br>
  <font size=3 color="#99FF00"> <font face="Arial, Helvetica, sans-serif" color="#9C0" size="4" >&nbsp;&nbsp;&nbsp;<?php include "tanggal.php"; echo tanggal_hari_ini();  ?>
    </font></font></td>
 <td width="745" align="center" valign="middle" style="padding-left:20px; padding-right:20px; background-size:1000px" bgcolor="#FF6600">
<marquee direction="left" scrolldelay="90">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle">
  <?php while ($hasil=mysqli_fetch_array($low)){ ?>
    <td align="center" valign="middle">
	
	<?php echo "<font size=5 color=white>$hasil[2] </font><font size=5 color=yellow>[$hasil[3]]&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</font>";?></td>
    <?php } ?>
  </tr>
</table></marquee>
</td>
<td width="95" align="middle" bgcolor="#006633"><?php include "jam.html";?></td></tr>
</table>