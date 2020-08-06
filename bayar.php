<?php
$title = "bayar Produk";
include("includes/header.php");

if(isset($_POST['bayar'])){
    
    $nama = $_POST['nama'];
    $telp = $_POST['phone'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($con,"insert into customer (nama_customer, alamat_customer, telp_customer) value ('$nama', '$alamat', '$telp')");
    if($insert){
        $cust_id = mysqli_query( $con,"select id_customer from customer order by id_customer DESC");
        $res_cust = mysqli_fetch_assoc($cust_id);
        $customer_id = $res_cust['id_customer'];      
        $qty = $_POST['qty'];
        $id = $_POST['id'];
        $setPenjualan = mysqli_query($con,"insert into penjualan (qty_penjualan, id_barang, id_customer) value ('$qty', '$id', '$customer_id')");
        if($setPenjualan){

            $Qbarang = mysqli_query($con,"select * from barang where id_barang = '$id'");
            $data = mysqli_fetch_assoc($Qbarang);

?>
        <div class="row">
            <div class="col-md-12">
                <h2> Detail yang harus di bayar</h2>
                <table class="table">
                    <thead>
                       <tr>
                           <th>Nama Barang</th>
                           <th>Harga Satuan</th>
                           <th>Qty</th>
                           <th>Jumlah</th>
                       </tr>
                    </thead>
                    <tbody>
                       <tr>
                           <td><?=$data['nama_barang'];?></td>
                           <td>Rp. <?=number_format($data['harga_barang']);?></td>
                           <td><?=$qty;?></td>
                           <td>Rp. <?=number_format($data['harga_barang'] * $qty);?></td>
                       </tr>
                    </tbody>
                </table>
                <h3>Total Yang Hars Di bayar : Rp. <?=number_format($data['harga_barang'] * $qty);?>,-</h3>
            </div>
            <div class="col-md-12">
                <hr>
                <p>Informasi Pembayaran:</p>
               
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit possimus deleniti rerum, voluptate dolorem tenetur fugiat. Dolores obcaecati sit neque maxime quae nemo? Molestiae voluptates ipsa aliquam ut error adipisci? Expedita, ab reiciendis? Quis, veritatis facere adipisci distinctio quae et dolorum fuga ab, numquam saepe ipsa enim ipsam tempore labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus officia eligendi illo nobis suscipit totam placeat nisi corporis, magni alias enim, voluptates beatae, aliquam illum. Dicta nihil doloremque omnis officia?</p>
            </div>   
        </div>
<?php
        }
      }
    } 

?>

    <?php include('includes/footer.php'); ?>