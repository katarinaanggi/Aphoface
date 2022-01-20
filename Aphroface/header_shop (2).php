<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="css/bootstrap-4.5.2-dist/css/bootstrap.min.css">
  <!-- Own CSS -->
  <link rel="stylesheet" href="css/style.css">
  <!-- jQuery library -->
  <script src="js/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="js/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="css/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Shrikhand&family=Yeseva+One&family=Poppins&display=swap" rel="stylesheet">
  <!-- Load icon library -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
    body {
      background-color: white;
    }
    .fa {
        color: #d46871;
    }
    #text_nav {
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      font-size: 12px;
      font-weight: bold;
      text-align: center;
      letter-spacing: 1px;
    }
    select {
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      font-size: 12px;
      font-weight: bold;
      text-align: center;
      letter-spacing: 1px;
      border: none;
      background-color: #c59498;
    }
    #logout {
      font-family: 'Yeseva One', cursive;
      border: none;
      background-color: #d46871;
      color: white;
      padding: 8px 14px;
      text-align: center;
      font-size: 12px;
      border-radius: 5px;
      position: absolute;
    }

    .welcome{
      font-family: 'Poppins', sans-serif;
      color: #ffffff;
      font-size: 14px;
      text-align: right;
      margin-bottom: 0;

    }

    #welcome_nav {
      margin-bottom: 0;
      letter-spacing: 1px;
    }

    #welcome {
      font-weight: bolder;
    }

    #welcome_username{
      letter-spacing: 1px;
      font-weight: 10px;
    }

    #div3 {
      margin-left: 0px;
    }

    .welcome-nav {
      margin-right: 30px;
    }

    .dropdown-item-style {
      font-family: 'Poppins', sans-serif;
      color: white;
      font-size: 12px;
    }

    .dropdown-more {
      font-family: 'Poppins', sans-serif;
      color: white;
      font-size: 12px;
      border-top: 1px solid #e0bcc1;
    }

    #atcbutton {
      font-family: 'Poppins', sans-serif;
      border: none;
      background-color: #d46871;
      color: white;
      font-size: 15px;
    }

    #mycart {
        color: white;
        padding-left: 30px;
        padding-right: 30px;
    }
  </style>
  <title>Aphroface</title>
</head>
<body>
  <?php
    session_start();
    if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }else{
    header('Location: signin.php');
    exit();
  } ?>
    <nav id ="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color:#e0bcc1;">
        <div class="collapse navbar-collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a id = text_nav class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a id = text_nav class="nav-link" href="forum.php">BEAUTY FORUM</a>
            </li>
          </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" style="font-family: 'Shrikhand', cursive; color: #785e54;" href="#">APHROFACE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div id="div2" class="navbar-collapse collapse w-100 order-2 dual-collapse2">
          <ul id="welcome_nav" class="navbar-nav ml-auto">
            <ul class="navbar-nav ml">
              <li class="welcome-nav">
                <p class="welcome" id="welcome">WELCOME,</p>
                <p class="welcome" id="welcome_username"><?php echo $username ?></p>
              </li>
          </ul>
        </div>
        <div id="div3" class="navbar-collapse collapse w-40 order-3 dual-collapse2">
            <ul id="logout_ul" class="navbar-nav ml-auto">
                <li><a class="btn btn-danger btn-sm"
                    style="
                    border: none;
                    background-color: #d46871;
                    font-size: 16px;
                    padding: 8px 20px;
                    font-family: 'Rubik', sans-serif;
                    border-radius: 8px;"
                    href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--Second Navbar-->
    <nav id ="navbar" class="navbar navbar-expand-lg navbar-light" style="background-color:#c59498;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <select name="categories" id="categories" onchange="showCat(this.value)">
                <option value="">CATEGORIES</option>
                <option value="skincare">SKIN CARE</option>
                <option value="makeup">MAKE UP</option>
            </select>
            <select name="brands" id="brands" onchange="showBrand(this.value)">
                <option value="">BRANDS</option>
                <?php
                require_once('db_login.php');
                //Asign a query
                $query = " SELECT * FROM produk ";
                $result = $db->query( $query );
                if (!$result){
                die ("Could not query the database: <br />". $db->error);
                }
                // Fetch and display the results
                while ($row = $result->fetch_object()){
                    echo '<option value="'.$row->brand.'">'.$row->brand.'</option>';
                }
                $result->free();
                ?>
            </select>
          </ul>
        </div>
        <script src="ajax.js"></script>
        <div class="mx-auto order-0">
             <input class="form-control mr-sm-2" type="text" id="produk" placeholder="&#xF002; Search Product"
             style="font-family:'Poppins', FontAwesome; width: 250px" 
             onkeyup="searchProduk(this.value)"/>
          </div>
        <div id="div2" class="navbar-collapse collapse w-100 order-2 dual-collapse2">
          <ul id="welcome_nav" class="navbar-nav ml-auto">
            <ul class="navbar-nav ml">
              <li class="nav-item">
                <a id = text_nav class="nav-link" href="profile.php">MY PROFILE</a>
              </li>
              <a id=mycart class="fa fa-shopping-cart fa-2x" href="checkout.php"></a>
            </ul>
          </ul>
        </div>
    </nav>