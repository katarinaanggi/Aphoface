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
  <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Shrikhand&family=Space+Grotesk&family=Yeseva+One&family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #e0bcc1;
    }
    #title_profile {
      font-family: 'Shrikhand', cursive;
      color: #785e54;
      font-size: 75px;
      text-align: center;
      padding-top: 5%;
    }

    #text_nav {
      font-family: 'Poppins', sans-serif;
      color: #c59498;
      font-size: 15px;
      font-weight: bold;
      text-align: center;
    }
    #text_navHome {
      font-family: 'Poppins', sans-serif;
      color: #f1f0f0;
      font-size: 15px;
      font-weight: bold;
      text-align: center;
      padding: 16px;
    }

    #profile_name {
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
      font-size: 60px;
      color: white;
      padding-top: 5%;
      padding-bottom: 0;
      margin-bottom: 0;
      letter-spacing: 3px;
    }

    #profile_edit_name {
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
      font-size: 15px;
      color: #d46871;
      letter-spacing: 1px;
    }

    #profile_username {
      font-family: 'Rubik', sans-serif;
      color: #B89B9F;
      margin-bottom: 1px;
      font-size: 18px;
    }

    .subprofile {
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
      font-size: 20px;
      color: #B89B9F;
      margin-bottom: 0;
      letter-spacing: 2px;
      padding-top: 2%;
    }

    .profile_value{
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
      color: white;
      width: 50%;
      letter-spacing: 1px;
    }

    #button_edit {
      font-family: 'Poppins', sans-serif;
      border: none;
      background-color: #c59498;
      color: white;
      padding: 10px 20px;
      text-align: center;
      font-size: 15px;
      display: inline-block;
      border-radius: 8px;
      font-weight: bold;
      outline: none;
      margin-top: 2%;
      letter-spacing: 1px;
    }

    #title_history {
      font-family: 'Shrikhand', cursive;
      color: #785e54;
      font-size: 75px;
      text-align: center;
      padding-top: 5%;
    }

    .subhistory {
      font-family: 'Rubik', sans-serif;
      color: #6B4F4F;
      text-align: center;
    }

    .subhistory_value {
      font-family: 'Rubik', sans-serif;
      color: #785e54;
    }
  </style>
  <title>Aphroface</title>
</head>
<body>
  <?php
  session_start();
  if(!isset($_SESSION['username'])){
    header('Location: signin.php');
    exit();
  }else{
    $username = $_SESSION['username'];
  }
  ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#efdddf;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a id = text_nav class="nav-link" href="profile.php">MY PROFILE <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a id = text_nav class="nav-link" href="purchase_history.php">MY PURCHASE HISTORY</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a id = text_navHome class="nav-link" href="shop.php">BACK TO SHOP ></a>
            </li>
          </ul>
        </div>
    </nav>
    <div class="container">