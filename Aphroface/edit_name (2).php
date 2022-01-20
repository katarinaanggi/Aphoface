<?php include('header_edit.html');
$uname = $_GET['uname'];

require_once('db_login.php');
if(!isset($_POST["submit"])){
  $query = " SELECT nama, username FROM customer WHERE UPPER(username) = '".$uname."' ";
  $result = $db->query($query);
  if (!$result){
      die ("Could not the query database: <br />" . $db->error);
  } else {
      while ($row = $result->fetch_object()){
          $nama = $row->nama;
          $uname = $row->username;
      }
  }
}else{
  $valid = TRUE; //flag validasi
  $nama = test_input($_POST["nama"]);
  if ($nama == ''){
    $error_nama = "Name is required";
    $valid = FALSE;

  }

  if ($valid){
    //asign a query
    $query = "UPDATE customer SET nama = '".$nama."' WHERE username = '".$uname."'";
    //execute the query
    $result = $db->query($query);
    if (!$result){
      die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
    }else{
      echo '<div class="alert alert-success" id="edit_success">Name changed successfully!</div>';
    }
  }

}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?uname=' .$uname; ?>" method="post">
  <h1 id="title_edit_name" class="title_edit">Edit Name<br /></h1>
  <label id="edit_profile_username" class="sub_edit_profile" for="username">Your Username</label><br>
  <input type="text" id="username" class="edit_profile_value" name="username" value="<?php echo $uname ?>" disabled>
  <div class="text-danger"><?php if(isset($error_username)) echo $error_username;?></div>
  <label id="edit_profile_nama" class="sub_edit_profile" for="nama">Your Name</label><br>
  <input type="text" id="nama" class="edit_profile_value" name="nama" value="<?php echo $nama ?>">
  <div class="text-danger"><?php if(isset($error_nama)) echo $error_nama;?></div>
  <br>
  <button type="submit" class="btn btn-primary" class="center-block" name="submit" value="submit" id="submit_edit_username" >Submit</button>
  <a id="cancel_edit_username" href="profile.php" class="btn btn-secondary">Cancel</a>
</form>
<?php include('footer.html') ?>