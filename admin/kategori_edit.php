<?php
$tile = "Edit Kategori";
include('includes/header.php');

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nama = $_POST['nama'];

    $query = mysqli_query($con, "update kategori set nama_kategori = '$nama' where id_kategori = '$id' ");

    if ($query) {
        //akan memindah ke kategori.php
        echo "<script> 
        window.location='" . BASE_URL . "admin/kategori.php'
        </script>";
    }
}

$query = mysqli_query($con, "select nama_kategori from kategori where id_kategori = '$id'");
$data = mysqli_fetch_assoc($query);
?>


<div class="container-fluid">

    <ol class="breadcrumb">
        
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?= BASE_URL;?>admin/kategori.php">Table Kategori</a>
        </li>
        <li class="breadcrumb-item active">Edit Kategori</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>Edit Kategori</div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama" value="<?= $data['nama_kategori']; ?>" placeholder="Nama Kategori" required>
                </div>

                <div class="form_grup">
                    <input type="submit" name="update" value="simpan" class="btn-btn-sm btn-success">
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