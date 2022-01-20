<?php include('header_profile.php');
?>
<h1 id="title_history">My Purchase History<br /></h1>
<?php
echo '<table id="review" class="table table-striped">';
echo '<tr>';
  echo '<th class="subhistory">Image</th>';
  echo '<th class="subhistory">Product Name</th>';
  echo '<th class="subhistory">Qty</th>';
  echo '<th class="subhistory">Subtotal</th>';
echo '</tr>';
$username = $_SESSION['username'];
require_once('db_login.php');
$query = " SELECT p.image, p.produk_name, dt.jumlah, dt.subtotal FROM transaksi t INNER JOIN detail_transaksi dt ON t.id_transaksi = dt.id_transaksi INNER JOIN produk p ON dt.id_produk = p.id_produk WHERE t.username = '".$username."'";
$result = $db->query($query);
if (!$result){
  die ("Could not query the database: <br />". $db->error);
}
while($row = $result->fetch_object()){
  echo '<tr>';
  $image = $row->image;
  echo '<td class="subhistory_value" style="text-align: center;">'.'<img src="'.$image.'" width="50">'.'</td>';
  echo '<td class="subhistory_value">'.$row->produk_name.'</td> ';
  echo '<td class="subhistory_value" style="text-align: center;">'.$row->jumlah.'</td>';
  echo '<td class="subhistory_value" style="text-align: center;">'.$row->subtotal.'</td>';
  echo '</tr>';
}
echo '</table>';
echo '<br />';
$result->free();
$db->close();
?>
<?php include ('footer.html') ?>
