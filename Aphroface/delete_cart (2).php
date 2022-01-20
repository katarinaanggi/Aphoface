<?php
//File: delete_cart.php
//Deskripsi: untuk menghapus session
session_start();
if(isset($_SESSION['cart'])){
    unset($_SESSION['cart']);
}
require_once('db_login.php');
$username = $_GET['username'];
$query = "DELETE FROM cart WHERE username='$username'";
//execute the query
$result = $db->query($query);
if (!$result){
    die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
} else{
    $db->close();
}
header('Location: shop.php');
?>
<?php
$db->close();
?>