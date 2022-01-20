<?php include ('header_checkout.html');
session_start();
$id_transaksi = $_GET['id_transaksi'];
if(!isset($_SESSION['username'])){
  header('Location: signin.php');
  exit();
}
$uname = $_SESSION['username'];
require_once ('db_login.php');
?>
<?php
if (isset($_POST["submit"])){
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
                <div class="alert alert-danger" style="background-color: #d46871; font-family: 'Rubik', sans-serif; color: white;" role="alert">Order failed. Please try again.</div>
              <?php
              } else{
                ?>
                <br><br><br>
                <div class="alert alert-success" style="background-color: #9CC094; font-family: 'Rubik', sans-serif; color: white;" role="alert">Order Successful. Thank you for trusting our shop.</div>
                <?php
              }
        }else{ ?>
          <br><br><br>
          <div class="alert alert-danger" style="background-color: #d46871; font-family: 'Rubik', sans-serif;" role="alert">File bukti terlalu besar</div>
          <?php
      }
  }
}

?>
<style>
  form{
    margin-bottom: 100px;
  }
  .pay_trf {
    display: none;
  }
  select {
    font-family: 'Poppins', sans-serif;
    color: #785e54;
    font-size: 16px;
    letter-spacing: 1px;
    width: 100%;
    background-color: #efdddf;
    border: none;
    border-bottom: 1px solid #d46871;
  }
  #norek, label {
    font-family: 'Rubik', sans-serif;
    color: #785e54;
    text-align: center;
  }
  #norek_header {
    font-family: 'Rubik', sans-serif;
    color: #785e54;
    font-weight: bold;
    text-align: center;
  }
  input {
    font-family: 'Poppins', sans-serif;
    letter-spacing: 1px;
    width: 100%;
    color: #785e54;
    border: none;
    border-bottom: 1px solid #d46871;
    background-color: #efdddf;
  }
  input[type="file"] {
    display: none;
  }
  .custom-file-upload {
      border: 1px solid #d46871;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
  }
  input:focus, select:focus {
    outline: none;
  }
</style>
<script>
  function showRekening(){
    //hide all div
    var pay = document.getElementsByClassName("pay_trf");
    for(var i = 0; i < pay.length; i++){
      pay[i].style.display = "none";
    }
    //unhide selected div
    var bank = document.getElementById("pilihbank");
    if(bank.value != "") {
      payment = document.getElementById("pay_" + bank.value);
      payment.style.display = 'block';
    }
  }
  function namafile(){
    var filename = document.getElementById("file-upload").files[0].name;
    document.getElementById("file-name").textContent = filename;
  }
</script>
<h2 class="title_co">PAYMENT</h2>
<br>
<div class="container">
  <form id="payment" method="POST" autocomplete="on" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id_transaksi=' .$id_transaksi; ?>">
    <div class="form-group">
      <label for="idt">ID Transaksi</label><br>
      <input type="text" name="idtransaksi" id="idt" value="<?php echo $id_transaksi ?>">
    </div>
    <div class="form-group">
      <label for="user_norek">Nomor Rekening Anda</label><br>
      <input type="text" name="user_norek" id="user_norek" required>
    </div><br>
    <div class="form-group">
      <label for="user_name">Nama Pemilik Rekening</label><br>
      <input type="text" name="user_name" id="user_name" required>
    </div><br>
    <div class="form-group">
      <label for="pilihbank">Nama Bank Tujuan</label><br>
      <select name="pilihbank" id="pilihbank" onchange="showRekening()" required>
        <option value="">Pilih bank</option>
        <option value="bca">BCA</option>
        <option value="bri">BRI</option>
        <option value="mandiri">Mandiri</option>
      </select>
    </div>
    <div id=rekening>
      <div class="card pay_trf" id="pay_bri" style="width: 15rem;">
        <img src="image/bri.jpg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title" id="norek_header">Nomor Rekening</h5>
          <p class="card-text" id="norek">098989978979789789</p>
        </div>
      </div>
      <div class="card pay_trf" id="pay_bca" style="width: 15rem;">
        <img src="image/bca2.png" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title" id="norek_header">Nomor Rekening</h5>
          <p class="card-text" id="norek">73126414874</p>
        </div>
      </div>
      <div class="card pay_trf" id="pay_mandiri" style="width: 15rem;">
        <img src="image/mandiri.jpg"class="card-img-top">
        <div class="card-body">
          <h5 class="card-title" id="norek_header">Nomor Rekening</h5>
          <p class="card-text" id="norek">763417264964789898</p>
        </div>
      </div>
    </div>
    <br>
    <div class="form-group">
      <label>Bukti Transfer</label><br>
      <label for="file-upload" class="custom-file-upload">
        <i class="fas fa-cloud-upload-alt"></i> Upload</label>
      <input id="file-upload" name='file-upload' type="file" style="display:none;" onchange="namafile()" required>
      <label id="file-name"></label>
      <p style="color: #d46871">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
      <p style="color: #d46871; font-weight: bold">Wajib upload bukti transfer.</p>
		</div>
    <button type="submit" name="submit" value="submit" id="pay">Submit</button>
  </form>
</div>
<?php include ('footer.html'); ?>
