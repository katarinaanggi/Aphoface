<?php include ('header_profile.php');

?>
<?php
require_once('db_login.php');
$query = " SELECT username, UPPER(email), noHP, UPPER(alamat), UPPER(nama) FROM customer WHERE username='".$username."' ";
//Execute the query
$result = $db->query($query);
$hasil = mysqli_fetch_row($result);
$username = $hasil[0];
$email = $hasil[1];
$nohp = $hasil[2];
$alamat = $hasil[3];
$name = $hasil[4];
?>
<h1 id="title_profile">My Profile<br /></h1>
<h1 id="profile_name"><?php echo "$name"?></h1>
<p id="profile_username"><?php echo "@$username" ?></p>
<a id="profile_edit_name" href="edit_name.php?uname=<?php echo $username ?>">EDIT NAME</a>
<p class="subprofile" id="profile_address">ADDRESS</p>
<p class="profile_value" id="profile_address_value"><?php echo $alamat ?></p>
<p class="subprofile" id="profile_phone">PHONE NUMBER</p>
<p class="profile_value" id="profile_number_value"><?php echo $nohp ?></p>
<p class="subprofile" id="profile_email">EMAIL ADDRESS</p>
<p class="profile_value" id="profile_email_value"><?php echo $email ?></p>
<button id="button_edit" onclick="document.location='edit_profile.php?uname=<?php echo $username ?>'" type="button" name="button">EDIT DETAILS</button>
<!--Require SESSION USERNAME-->
<?php include ('footer.html') ?>
