<?php
include('includes/header.php');
$id = $_GET['id'];

$query = mysqli_query($con, "delete from kategori where id_kategori = '$id' ");

if ($query) {
    echo "<script> 
    window.location='" . BASE_URL . "admin/kategori.php'
    </script>";
}
