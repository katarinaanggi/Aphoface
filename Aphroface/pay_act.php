<?php include ('header_checkout.html');
require_once ('db_login.php'); 
$idt = $_POST['idtransaksi'];
$nama = $_POST['user_name'];
$norek = $_POST['user_norek'];
$bank = $_POST['pilihbank'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg');
$filename = $_FILES['file-upload']['name'];
$ukuran = $_FILES['file-upload']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
    echo 'done';
    ?>
    <br><br><br>
	<div class="alert alert-danger" role="alert">Ekstensi tidak sesuai.</div>
    <?php
}else{
	if($ukuran < 1044070){		
        $xx = 'image/'.$rand.'_'.$filename;
        move_uploaded_file($_FILES['file-upload']['tmp_name'], $xx);
            $query = "INSERT INTO payment (id_transaksi, nama, norek, bank, bukti) 
                      VALUES('$idt','$nama','$norek','$bank','$xx')";
            $result = $db->query($query);
            if(!$result){  ?>
              <br><br><br>
              <div class="alert alert-danger" role="alert">Order failed. Please try again.</div>
            <?php
            } else{
              ?>
              <br><br><br>
              <div class="alert alert-success" role="alert">Order Successfull. Thank you for trusting our shop.</div>
              <?php
            }
      }else{ ?>
        <br><br><br>
        <div class="alert alert-danger" role="alert">File bukti terlalu besar</div>
        <?php 
    }
}
?>