<style>
    .subforum {
      font-family: 'Rubik', sans-serif;
      color: #6B4F4F;
      text-align: center;
    }

    .subforum_value {
      font-family: 'Rubik', sans-serif;
      color: #785e54;
    }
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&family=Shrikhand&family=Space+Grotesk&family=Yeseva+One&display=swap" rel="stylesheet">

<table id="review" class="table table-striped">
    <tr>
        <th class="subforum">Image</th>
        <th class="subforum">Author</th>
        <th class="subforum">Review</th>
        <th class="subforum">Product</th>
    </tr>
<?php
require_once('db_login.php');
$keyword = $_GET['keyword'];
//Asign a query
$query = " SELECT image,username,review,produk_name FROM review JOIN produk ON review.id_produk = produk.id_produk WHERE review LIKE '%$keyword%' OR produk_name LIKE '%$keyword%' OR username LIKE '%$keyword%'";
$result = $db->query( $query );
if (!$result){
   die ("Could not query the database: <br />". $db->error);
}
while ($row = $result->fetch_object()){
    echo '<tr>';
    $image = $row->image;
    echo '<td class="subform_value">'.'<img src="'.$image.'" width="100">'.'</td>';
  	echo '<td class="subform_value" style="font-family: Rubik, sans-serif; color: #785e54;">'.$row->username.'</td>';
  	echo '<td class="subform_value" style="font-family: Rubik, sans-serif; color: #785e54;">'.$row->review.'</td>';
  	echo '<td class="subform_value" style="font-family: Rubik, sans-serif; color: #785e54;">'.$row->produk_name.'</td>';
    echo '</tr>';
	echo '</table>';
}
$result->free();
$db->close();
?>
