<?php include('header.html') ?>
<div class="home">
  <h1 id="title_home">Your one-stop beauty<br />companion,<br />Aphroface.</h1>
  <button id="shop_home" type="button" onclick="document.location='shop.php'">SHOP NOW</a></button>
  <h6 id="text_home"><a href="signup.php" id="text_home2">Sign Up Now</a></h6>
</div>
<hr class="hru">
<div class="offers">
  <h3 id="offers">OFFERS</h3>
  <p id="sub_offers">We offer everything you'll ever need, just name it.</p>
  <div class="offers_images">
    <img class="offerimages"id="shop_img" src="image/shopping.png" alt="shop image"/>
    <img class="offerimages" id="forum_img" src="image/forum.png" alt="forum image">
  </div>
  <a id="offers_shop" href="shop.php">SHOP</a>
  <a id="offers_forum" href="forum.php">FORUM</a>

</div>
<hr class="hru">
<div class="about">
  <h3 id="about">ABOUT US</h3>
  <img class="aboutimages" src="image/about.png" alt="about image">
  <p id="about_detail">Aphroface is a web-based beauty products shop and forum made in 2021. We are here to introduce you to fantastic local products and help you take care of your skin with just the tip of your finger. Experience the ease now.</p>
</div>
<hr class="hru">
<div class="contact">
  <h3 id="contact">CONTACT US</h3>
  <div class="contact_value">
  <i class="fa fa-envelope fa-2x" aria-hidden="true"></i></i><br>
    <p class="contacts">aphrofacebeauty@gmail.com</p><br>
    <i class="fa fa-phone fa-2x" aria-hidden="true"></i><br>
    <p class="contacts">(021) 500600</p><br>
    <i class="fa fa-twitter fa-2x"> </i><br>
    <p class="contacts">@aphrofacebeauty</p>
  </div>
</div>
<?php include('footer.html') ?>