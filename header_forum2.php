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
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
    body {
      background-color: #e0bcc1;
    }
    .fa {
        color: #d46871;
    }
    input::-webkit-input-placeholder { /* WebKit browsers */
    color:    #785e54;
    }
    input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #785e54;
    }
    input::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #785e54;
    }
    input:-ms-input-placeholder { /* Internet Explorer 10+ */
        color:    #785e54;
    }

    textarea::-webkit-input-placeholder { /* WebKit browsers */
    color:    #785e54;
    }
    textarea:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
        color:    #785e54;
    }
    textarea::-moz-placeholder { /* Mozilla Firefox 19+ */
        color:    #785e54;
    }
    textarea:-ms-input-placeholder { /* Internet Explorer 10+ */
        color:    #785e54;
    }

    .subaddforum {
      font-family: 'Rubik', sans-serif;
      color: #785e54;
    }

    #review {
      color: #785e54;
      font-family: 'Rubik', sans-serif;
    }

    #produk {
      color: #785e54;
      background-color: #e0bcc1;
      font-family: 'Rubik', sans-serif;
    }

    #title_forum {
      font-family: 'Shrikhand', cursive;
      color: #785e54;
      font-size: 75px;
      text-align: center;
      padding-top: 5%;
      padding-bottom: 3%;
      letter-spacing: 2px;
    }

    #shop_forum {
      background-color: #d46871;
      border-color: #d46871;
      font-family: 'Rubik', sans-serif;
    }

    #shop_forum_cancel {
      background-color: #D0CAB2;
      color: #785e54;
      border-color: #d46871;
      font-family: 'Rubik', sans-serif;
    }

    #review_success {
      background-color: #d46871;
      color: white;
      width: 60%;
      margin: auto;
      text-align: center;
      margin-top: 4%;
      font-family: 'Rubik', sans-serif;
    }

    .forum_username {
      border: none;
      background: transparent;
      border-bottom: 1px solid #d46871;
      width: 100%;
      font-family: 'Rubik', sans-serif;
    }

    .forum_username:focus {
      outline: none;
    }

    .forum_product {
      border: none;
      background: transparent;
      border-bottom: 1px solid #d46871;
      width: 100%;
      font-family: 'Rubik', sans-serif;
    }

    .forum_product:focus {
      outline: none;
    }

    .forum_review {
      border: none;
      background: transparent;
      border-bottom: 1px solid #d46871;
      width: 100%;
      font-family: 'Rubik', sans-serif;
    }

    .forum_review:focus {
      outline: none;
    }

    .text-danger {
      color:#d46871;
      font-family: 'Rubik', sans-serif;
    }

  </style>
  <title>Aphroface</title>
</head>
<body>
  <?php
    session_start();
    if(isset($_SESSION['username'])){
    $uname= $_SESSION['username'];
  } ?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#efdddf;">
        <div class="collapse navbar-collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <a class="fa fa-chevron-circle-left fa-2x blue" href="forum.php"></a>
            </ul>
            <ul class="navbar-nav ml-auto">
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
