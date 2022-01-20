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
  <!-- Load icon library -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="image/icon.png">
  <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Shrikhand&family=Space+Grotesk&family=Yeseva+One&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
    body {
      background-color: #e0bcc1;
    }

    #cart {
      background-color: transparent;
      border: none;
    }

    .fa {
        color: #d46871;
    }
    .subforum {
      font-family: 'Rubik', sans-serif;
      color: #6B4F4F;
      text-align: center;
    }

    .subforum_value {
      font-family: 'Rubik', sans-serif;
      color: #785e54;
    }

    table {
      border-style: hidden;
      border-collapse: collapse;
    }

    table th, table td{
      border: 3px solid #e0bcc1;
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

    #cart {
      font-family: 'Shrikhand', cursive;
      color: #785e54;
      font-size: 75px;
      text-align: center;
      letter-spacing: 2px;
    }

    .cont {
      background-color: #cc586b;
      color: white;
      font-family: 'Rubik', sans-serif;
    }

    .empty {
      background-color: #cf555f;
      color: white;
      font-family: 'Rubik', sans-serif;
    }
    .co {
      background-color: #c9364f;
      color: white;
      font-family: 'Rubik', sans-serif;
    }
    #mycart {
        color: #d46871;
        padding-left: 30px;
        padding-right: 30px;
    }
    
    .subcart {
        font-family: 'Rubik', sans-serif;
      color: #6B4F4F;
      text-align: center;
    }

    .cart_value {
        font-family: 'Rubik', sans-serif;
      color: #6B4F4F;
    }
  </style>
  <title>Aphroface</title>
</head>
<body>
  <?php
  if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  }
   ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#efdddf;">
          <div class="collapse navbar-collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <a class="fa fa-chevron-circle-left fa-2x blue" href="shop.php"></a>
            </ul>
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
  <div class="container">
