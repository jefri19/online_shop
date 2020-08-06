<?php
$title = "Tambah Kategori";
include('includes/header.php');

if (isset($_POST['insert'])) {
    $nama = $_POST['nama'];

    $query = mysqli_query($con, "insert into kategori (nama_kategori) value ('$nama')");
    if ($query) {
        //akan memindah ke kategori.php
        echo "<script> 
        window.location='" . BASE_URL . "admin/kategori.php'
        </script>";
    }
}
?>


<div class="container-fluid">

    <ol class="breadcrumb">
        
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/kategori.php">Table Kategori</a>
        </li>
        <li class="breadcrumb-item active">Tambah Kategori</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i> Data Table Example</div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" required>
                </div>

                <div class="form_grup ">
                    <input type="submit" name="insert" class="form-control" value="Tambah" class="btn-btn-sm btn-info ">
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
<script src="<?= BASE_URL;?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= BASE_URL;?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL;?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= BASE_URL;?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?= BASE_URL;?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="<?= BASE_URL;?>assets/js/sb-admin.min.js"></script>
<script src="<?= BASE_URL;?>assets/js/demo/datatables-demo.js"></script>

</body>

</html>