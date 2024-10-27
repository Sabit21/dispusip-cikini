<marquee direction="up" scrollamount="5" scrolldellay="100" height="500">
<?php
include "koneksi.php";
$cari=mysqli_query($koneksi,"select * from agenda order by id DESC limit 0,10");
while($isi=mysqli_fetch_array($cari)){
	
	?>
    
  <table width="100%" border="0" cellspacing="0" cellpadding="20" style="font-size:24px">
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="D2E9E9"><img src="img/calendar_date_event_month-512.png" width="90" height="80" align="absmiddle" />&nbsp;&nbsp;&nbsp;&nbsp;<b><?=$isi[1];?>
    </b></td>
    </tr>
  <tr height="50">
    <td width="18%" valign="middle" bgcolor="F8F6F4">Waktu</td>
    <td width="3%" valign="middle" bgcolor="F8F6F4">:</td>
    <td width="79%" valign="middle" bgcolor="F8F6F4"><?=$isi[5];?></td>
  </tr>
  <tr height="50">
    <td valign="middle" bgcolor="E3F4F4">Kegiatan</td>
    <td valign="middle" bgcolor="E3F4F4">:</td>
    <td valign="middle" bgcolor="E3F4F4"><?=$isi[2];?></td>
  </tr>
  <tr height="50">
    <td valign="middle" bgcolor="F8F6F4">Lokasi</td>
    <td valign="middle" bgcolor="F8F6F4">:</td>
    <td valign="middle" bgcolor="F8F6F4"><?=$isi[4];?></td>
  </tr>
  <tr height="50">
    <td valign="middle" bgcolor="E3F4F4">Keterangan</td>
    <td valign="middle" bgcolor="E3F4F4">:</td>
    <td valign="middle" bgcolor="E3F4F4"><?=$isi[3];?></td>
  </tr>
  <tr>
    <td colspan="3"><hr color="#FF6600" /></td>
    </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
  
    <?php
	
	
}


?></marquee>