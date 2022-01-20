<?php
//File      : signin.php
//Deskripsi : menampilkan form login dan melakukan login ke halaman admin.php
session_start(); //inisialisasi session
require_once('db_login.php');
//cek apakah user sudah submit form
if(isset($_POST["submit"])){
    $valid = TRUE; //flag validasi

    //cek validasi username
    $username = test_input($_POST['username']);
    if($username == ''){
        $error_username = "Username/email is required";
        $valid = FALSE;
    }

    //cek validasi password
    $password = test_input($_POST['password']);
    if($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //cek validasi
    if($valid){
        //Assign a query
        $query = " SELECT * FROM customer WHERE username='".$username."' AND password='".$password."' ";
        //Execute the query
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />".$db->error);
        }else{
            if($result->num_rows > 0){ //login berhasil
                $_SESSION['username'] = $username;
                echo ($_SESSION['username']);
                header('Location: shop.php');
                exit();
            }else{ //login gagal
                echo '<div id="alert-login" class="alert alert-danger"> Combination of name and password incorrect. </div>';
            }
        }
        //close db connection
        $db->close();
    }
}
?>
<?php include('header.html') ?>
<div>
    <div>
        <div>
            <h1 id="sign_in">Sign In
        </div>
        <div>
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label class="signin_uname" for="username">Username</label>
                    <input type="username" class="signin_username" name="username" id="username" size="30" value="<?php if(isset($username)) echo $username;?>">
                    <div class="text-danger"><?php if(isset($error_username)) echo $error_username;?></div>
                </div>
                <div class="form-group">
                    <label class="signin_pw" for="password">Password</label>
                    <input type="password" class="signin_password" name="password" id="password" value="">
                    <div class="text-danger"><?php if(isset($error_password)) echo $error_password;?></div>
                </div>
                <div class="col text-center">
                    <br><br><br>
                    <button id="shop_home" type="submit" class="btn btn-primary" class="center-block" name="submit" value="submit">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.html') ?>