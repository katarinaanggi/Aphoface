<?php include('header_forum2.php');
require_once('db_login.php');
 ?>
<?php
if (isset($_POST['submit'])){
    $valid = TRUE; //flag validasi
    $username = $uname;
    $review = test_input($_POST['review']);
    if ($review == ''){
        $error_review = "Review is required";
        $valid = FALSE;
    }

    $produk = test_input($_POST['produk']);
    if ($produk == '' || $produk == 'none'){
        $error_produk = "Name of product is required";
        $valid = FALSE;
    }

    //update data into database
    if ($valid){
        //asign a query
        $query = "INSERT INTO review (username, review, id_produk) VALUES ('$username', '$review', $produk) ";
        //execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        } else{
            echo '<div class="alert alert-success" id="review_success">Review added!</div>';
        }
    }
}
?>
<br>
<div class="container">
    <div>
        <h1 id="title_forum">Add New Review<br /></h1>
        <div>
            <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <div class="form-group">
                    <label class="subaddforum" for="produk">Product</label><br />
                    <select name="produk" id="produk" class="forum_product">
                        <option value="none">--Choose the product--</option>
                        <?php
                        //Asign a query
                        $query = " SELECT * FROM produk ORDER BY id_produk";
                        $result = $db->query( $query );
                        if (!$result){
                            die ("Could not query the database: <br />". $db->error);
                        }
                        // Fetch and display the results
                        while ($row = $result->fetch_object()){
                            echo '<option value="'.$row->id_produk.'">'.$row->produk_name.'</option>';
                        }
                        $result->free();
                        $db->close();
                        ?>
                    </select>
                    <div class="text-danger"></div>
                </div>

                <div class="form-group">
                    <label class="subaddforum" for="review">Review</label><br>
                    <textarea type="text" class="forum_review" id="review" name="review" placeholder="Enter Your Review"></textarea>
                    <div class="text-danger"><?php if (isset($error_review)) echo $error_review;?></div>
                </div>

                <br>
                <button id="shop_forum" type="submit" class="btn btn-primary" class="center-block" name="submit" value="submit">Submit</button>
                <a id="shop_forum_cancel" href="forum.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
<?php include ('footer.html') ?>