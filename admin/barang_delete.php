<?php
include('includes/header.php');

$id = $_GET['id'];

$query = mysqli_query($con, "delete from barang where id_barang = '$id'");


if ($query) {
    //akan memindah ke kategori.php
    echo "<script> 
    window.location='" . BASE_URL . "admin/barang.php'
    </script>";
}
