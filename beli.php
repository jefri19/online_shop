<?php
$title = "Beli Produk";
include("includes/header.php");

?>


<form action="bayar.php" method="post">
  <div class="row">
    <div class="col-md-4">
        <h2>Isi Detail Informasi mu</h2>
        <div class="form-group"> 
        <div class="form-label-group">      
                <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" 
                required>                
            </div>
        </div>

        <div ulass="form-group">
            <div class="form-label-group">          
                 <input class="form-control" type="text" name="phone" placeholder="No. Telp" required>                 
            </div>
        </div>

        <div ulass="form-group " style="margin-top: 20px;">
            <div class="form-label-group">          
                  <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" required></textarea>  
             </div>
        </div>

        <div ulass="form-group" style="margin-top:20px;">
            <input class="btn btn-sm btn-success" type="submit" name="bayar" value="Bayar Sekarang">
            
            <input type="hidden" name="qty" value="<?=$_POST['qty'];?>">
            <input type="hidden" name="id" value="<?=$_POST['id'];?>">
        </div>
     </div>
        
    </div>
</form> 
    <?php include('includes/footer.php'); ?>