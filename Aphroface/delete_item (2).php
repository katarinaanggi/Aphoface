<?php
session_start();
$id_produk = $_GET['id_produk'];
if(isset($_SESSION['cart'])){
    unset($_SESSION['cart'][$id_produk]);
}
$username = $_GET['username'];
// Include our login information
require_once('db_login.php');
//Asign a query
$query = " DELETE FROM cart WHERE id_produk=$id_produk AND username='$username'";
// Execute the query
$result = $db->query( $query );
if (!$result){
   die ("Could not query the database: <br />". $db->error);
}else{
	$db->close();
	header('Location: shop.php');
}
//close db connection
$db->close();
?>