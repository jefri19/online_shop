<?php
$title = "Tambah Barang";
include('includes/header.php');

if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $gambar = $_FILES['gambar']['name'];
    $file = $_FILES['gambar']['tmp_name'];
    $kategori = $_POST['kategori'];


    $path = "../assets/barang/";
    if (move_uploaded_file($file, $path . $gambar)) {
        $query = mysqli_query($con, "insert into barang (nama_barang, harga_barang, stok_barang, satuan_barang, id_kategori, gambar_barang) values ('$nama', '$harga', '$stok', '$satuan', '$kategori', '$gambar')") or die(mysqli_error($con));
        if ($query) {
            //akan memindah ke kategori.php
            echo "<script> 
            window.location='" . BASE_URL . "admin/barang.php'
            </script>";
        }
    }
}
?>


<div class="container-fluid">

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/barang.php">Tambah Barang</a>
        </li>
        <li class="breadcrumb-item active">Table</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Data Table Barang</div>
        <div class="card-body">
            <form method="post" action="" enctype="multipart/form-data">
                <!-- tambahan -->
                <div class="row">
                    <div class="col-md-3">

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Barang" required>
                        </div>

                        <div class="form-group">
                            <label>Haraga Barang</label>
                            <input type="text" name="harga" class="form-control" placeholder="Harga Barang" >
                        </div>

                        <div class="form-group">
                            <label>Stok Barang</label>
                            <input type="number" name="stok" class="form-control" placeholder="stok Barang" required>
                        </div>

                        <div class="form-group">
                            <label>Satuan Barang</label>
                            <input type="text" name="satuan" class="form-control" placeholder="Satuan Barang" required>
                        </div>

                        <div class="form-group">
                            <label>Gambar Barang</label>
                            <input type="file" name="gambar" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Kategori Barang</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <?php
                                $Qkategori = mysqli_query($con, "select * from kategori ");


                                while ($kategori = mysqli_fetch_assoc($Qkategori)) {

                                ?>
                                    <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form_grup">

                            <input type="submit" name="insert" class="form-control" value="Tambah" class="btn-btn-sm btn-info">
                        </div>

                        <!-- akhirtambahan -->
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>
</div>
</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol logout untuk menghapus semuah sesi dan keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="assets/js/sb-admin.min.js"></script>
<script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>