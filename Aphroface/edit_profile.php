<?php include ('header_edit.html');
$uname = $_GET['uname'];

require_once('db_login.php');
if(!isset($_POST["submit"])){
  $query = " SELECT nama, alamat, noHP, email  FROM customer WHERE UPPER(username) = '".$uname."' ";
  $result = $db->query($query);
  if (!$result){
      die ("Could not the query database: <br />" . $db->error);
  } else {
      while ($row = $result->fetch_object()){
          $nama = $row->nama;
          $alamat = $row->alamat;
          $noHP = $row->noHP;
          $email = $row->email;
      }
  }
}else{
  $query = "SELECT nama FROM customer WHERE username = '".$uname."'";
  $result = $db->query($query);
  $nama = $result->fetch_row()[0];
  $valid = TRUE; //flag validasi
  $alamat = test_input($_POST["alamat"]);
  if ($alamat == '' || $alamat ==' '){
    $error_alamat = "Address is required";
    $valid = FALSE;
  }

  $noHP = test_input($_POST["noHP"]);
  if ($noHP == '' || $noHP ==' '){
    $error_noHP= "Phone number is required";
    $valid = FALSE;
  }

  $email = test_input($_POST["email"]);
  if ($email == '' || $email ==' '){
    $error_email = "Email is required";
    $valid = FALSE;
  }

  if ($valid){
    //asign a query
    $query = "UPDATE customer SET alamat = '".$alamat."', noHP = '".$noHP."', email = '".$email."' WHERE username = '".$uname."'";
    //execute the query
    $result = $db->query($query);
    if (!$result){
      die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
    }else{
      echo '<div class="alert alert-success" id="edit_success">Profile changed successfully!</div>';
    }
  }

}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?uname=' .$uname; ?>" method="post">
  <h1 id="title_edit_profile" class="title_edit">Edit Profile<br /></h1>
  <label class="sub_edit_profile" for="nama">Your Name</label>
  <input type="text" id="nama" class="edit_profile_value" name="nama" value="<?php echo $nama ?>" disabled>
  <label class="sub_edit_profile" for="alamat">Your Address</label>
  <textarea type="text" id="alamat" class="edit_profile_value" name="alamat" value="<?php echo $alamat ?>"><?php echo $alamat ?></textarea>
  <div class="text-danger"><?php if(isset($error_alamat)) echo $error_alamat;?></div>
  <label class="sub_edit_profile" for="noHP">Your Phone Number</label>
  <input type="text" id="noHP" class="edit_profile_value" name="noHP" value="<?php echo $noHP ?>">
  <div class="text-danger"><?php if(isset($error_noHP)) echo $error_noHP;?></div>
  <label class="sub_edit_profile" for="email">Your Email Address</label>
  <input type="text" id="email" class="edit_profile_value" name="email" value="<?php echo $email ?>">
  <div class="text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
  <button type="submit" class="btn btn-primary" class="center-block" name="submit" value="submit" id="submit_edit_profile" >Submit</button>
  <a id="cancel_edit_profile" href="profile.php" class="btn btn-secondary">Cancel</a>
</form>
<?php include ('footer.html') ?>
