<!--File		: forum.php
	Deskripsi	: menampilkan halaman forum
-->
<?php include('header_forum.php')
?>
<div class="card-body">
  <h1 id="titleforum">Reviews<br /></h1>
    <a id="review_button" href="add_forum.php">Add New Review</a><br>
    <table id="review" class="table table-striped">
        <tr>
            <th class="subforum">Image</th>
            <th class="subforum">Author</th>
            <th class="subforum">Review</th>
            <th class="subforum">Product</th>
        </tr>
        <br><br>
        <?php
        // Include our login information
        require_once('db_login.php');
        // Execute the query
        $query = "SELECT image,username,review,produk_name FROM review JOIN produk ON review.id_produk = produk.id_produk ORDER BY id_review";
        $result = $db->query($query);
        if(!$result){
            die("Could not query the database: <br />". $db->error ."<br>Query".$query);
        }
        // Fetch and display the results
        while($row = $result->fetch_object()){
            echo '<tr>';
            $image = $row->image;
            echo '<td class="subform_value">'.'<img src="'.$image.'" width="200">'.'</td>';
            echo '<td class="subforum_value">'.$row->username.'</td> ';
            echo '<td class="subforum_value">'.$row->review.'</td>';
            echo '<td class="subforum_value">'.$row->produk_name.'</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '<br />';
        $result->free();
        $db->close();
        ?>
        </table>
    <div>
    <div id="review"></div>
    </div>
</div>
<?php include('footer.html') ?>
