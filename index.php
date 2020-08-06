<?php
$title = "Home";
include("includes/header.php");

if (isset($_GET['filter'])) {
    $query = mysqli_query($con, "select * from barang where id_kategori = '" . $_GET['filter'] . "'");
    $data = mysqli_fetch_assoc($query);
} elseif (isset($_GET['s'])) {
    $key = "%" . $_GET['s'] . "%";
    $query = mysqli_query($con, "select * from barang where nama_barang like '$key'");
    $data = mysqli_fetch_assoc($query);
} else {
    $query = mysqli_query($con, 'select * from barang order by id_barang DESC');
    $data = mysqli_fetch_assoc($query);
}

?>

<div class="row">

    <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
            <!-- select kategori di halaman utama -->
            <a href="<?= BASE_URL; ?>" class="list-group-item">Semua kategori</a>
            <?php
            $Qkategori = mysqli_query($con, "select * from kategori order by nama_kategori ASC");
            $kategori = mysqli_fetch_assoc($Qkategori);

            do {

            ?>
                <a href="?filter=<?= $kategori['id_kategori']; ?>" class="list-group-item"><?= $kategori['nama_kategori']; ?></a>

            <?php
            } while ($kategori = mysqli_fetch_assoc($Qkategori));

            ?>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="row">

            <!-- komponen sercing -->
            <div class="col-lg-12 mt-3">
                <form action="" class="form-search-c">
                <div class="row">   
                <div class="col-md-9">    
                <div class="form-group mt-3">
                        <input class="form-control" type="search" value="<?php if (isset($_GET['s'])) { echo $_GET['s'];} ?>" name="s" placeholder="Masukan Nama Produk">
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-info btn-sm" value="cari produk">
                    </div>
                    </div>
                    </div> 
                </form>
            </div>
            <!-- akhir komponen -->

            <?php

            if (mysqli_num_rows($query) > 0) {

                do {

            ?>
                <div class="col-lg-4 col-md-6 mb-4 mt-3">
                    <div class="card h-100">
                    <a class="link-image-product" href="tampil.php?id=<?= $data['id_barang'] ?>">
                        <img class="card-img-top" src="<?= BASE_URL; ?>assets/barang/<?= $data['gambar_barang']; ?>" alt="">
                    </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="tampil.php?id=<?= $data['id_barang'] ?>"><?= $data['nama_barang']; ?></a>
                            </h4>
                            <h5>Rp.<?=number_format($data['harga_barang']) ; ?></h5>
                        </div>
                        <div class="card-footer">
                            <a class="btn-beli" href="tampil.php?id=<?= $data['id_barang'] ?>">BELI</a>
                        </div>
                    </div>
                </div>
            <?php
                } while ($data = mysqli_fetch_assoc($query));
            } else {
                echo "Tidak ada produk di tampilkan...:(";
            }
            ?>
           
        </div>   
    </div>
</div>
    <?php include('includes/footer.php'); ?>
   