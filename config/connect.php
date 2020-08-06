<?php //file untuk keneksi ke database
define("BASE_URL", "http://localhost/online_shop/");
define("WEBNAME", "online shop");

$con = mysqli_connect("localhost", "root", "") or die(mysqli_error($con)); //buka koneksi
mysqli_select_db($con, "online_shop") or die(mysqli_error($con)); //pilih database