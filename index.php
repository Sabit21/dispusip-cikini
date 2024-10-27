<title>AGENDA KADIS PUSIP DKI JAKARTA</title>
<meta http-equiv="refresh" content="3600" />
<?php
include "koneksi.php";
$ambilw=mysqli_query($koneksi,"select warna from warnabg where id=1");
$warna=mysqli_fetch_array($ambilw);
$ambilwbg=mysqli_query($koneksi,"select warna from warnabg where id=2");
$bg=mysqli_fetch_array($ambilwbg);
?>
<style type="text/css">
body
{
background-image: url('bg/<?=$bg[0];?>');
background-repeat: repeat;
background-color: #000;
background-size: auto;
} 
#trik_atas {position:fixed;_position:absolute;bottom:0px; left:0;right:0;clip:inherit;z-index: 2; padding-bottom:0;
_top:expression(document.documentElement.scrollTop+
document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLeft+
document.documentElement.clientWidth - offsetWidth);}
#float-left{position:fixed;_position:absolute;top:0px;float:left; margin-left:-500px;z-index:10;
clip:inherit;_top:expression(document.documentElement.scrollTop+
document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLeft+
document.documentElement.clientWidth - offsetWidth);}
#float-right{
position:fixed;_position:absolute;top:0px;float:right; margin-left:641px;z-index:10;
clip:inherit;_top:expression(document.documentElement.scrollTop+
document.documentElement.clientHeight-this.clientHeight);
_left:expression(document.documentElement.scrollLeft+
document.documentElement.clientWidth - offsetWidth);}
.atas {
  font-size: 24px;
}
.atas {
  color: #CCC;
}
.atase {
  font-size: 18px;
}
.aaas {
  font-size: 18px;
}
.adasd {
  font-size: 16px;
}
.atas .adasd {
  color: #CCC;
}
.cdd {
  color: #9C0;
  font-size: 24px;
}
.videoplace {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 16px;
  font-style: normal;
  color: #F60;
  
}
.transparan1{opacity:0.9;filter:alpha(opacity=70); background:white}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%">&nbsp;</td>
    <td width="73%" align="center"><img src="img/hider3.png" width="900" height="135" /></td>
    <td width="24%" align="right" style="padding-left:80px">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td align="center"><?php include "pengumuman.php";?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" >&nbsp;</td>
    <td  valign="center" valign="middle" class="transparan1" style="padding-left:20px; padding-right:20px; padding-top:20px">
      <?php include "jadwalkadis.php"; ?></td>
    <td valign="top"><table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="center" valign="bottom"><img src="img/up.png" width="300" height="32" /></td>
      </tr>
  <tr>
      <td valign="middle"><?php include "showbanner.php";?></td>
  </tr>
  <tr>
    <td colspan="3"><div id="trik_atas"><?php include "tampilow.php";?></div></td>
  </tr>
</table>
<?php
//include "koneksi.php";






?>