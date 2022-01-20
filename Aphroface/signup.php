<?php
session_start();
require_once('db_login.php');
if (isset($_POST["submit"])){
    $valid = TRUE; //flag validasi
    $username = test_input($_POST['username']);
    if ($username == ''){
        $error_username = "Username is required";
        $valid = FALSE;
    }

    $email = test_input($_POST['email']);
    if ($email == ''){
        $error_email = "Email is required";
        $valid = FALSE;
    }

    $password = test_input($_POST['password']);
    if ($password == ''){
        $error_password = "Password is required";
        $valid = FALSE;
    }

    //update data into database
    if ($valid){
        //escape inputs data
        //asign a query
        $query = " INSERT INTO customer (username, email, password) VALUES ('$username', '$email', '$password') ";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            $db->close();
            $_SESSION['username'] = $username;
            header('Location: shop.php');
            exit();
        }
    }
}
?>
<br>
<?php include ('header.html');?>
<div>
    <div>
        <h1 id="sign_up">Sign Up<br />
    </div>
    <div>
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label class="signup_attributes" for="username">Username</label><br />
                <input type="text" class="signup_username" id="username" name="username" size="15" value="">
                <div class="text-danger"><?php if(isset($error_username)) echo $error_username;?></div>
            </div>
            <div class="form-group">
                <label class="signup_attributes" for="email">Email</label><br />
                <input type="email" class="signup_email" id="email" name="email" size="30" value="">
                <div class="text-danger"><?php if(isset($error_email)) echo $error_email;?></div>
            </div>
            <div class="form-group">
                <label class="signup_attributes" for="password">Password</label><br />
                <input type="password" class="signup_password" id="password" name="password" size="30" value="">
                <div class="text-danger"><?php if(isset($error_password)) echo $error_password;?></div>
            </div>
            <br>
            <br>
            <div class="col text-center">
                <button id="shop_home" type="submit" class="btn btn-primary" class="center-block" name="submit" value="submit">Sign Up</button>
            </div>
        </form>
    </div>
</div>
<?php include('footer.html') ?>
