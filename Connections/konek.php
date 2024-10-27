<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_konek = "localhost";
$database_konek = "dispusip";
$username_konek = "root";
$password_konek = "";
$konek = mysqli_connect($hostname_konek, $username_konek, $password_konek, $database_konek);

if (!$konek) {
    die("connection faild: " . mysqli_connect_error());
}
?>