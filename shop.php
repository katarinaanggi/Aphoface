<?php include ('header_shop.php');
?>
<div id="detail_select">
        <?php
        require_once('db_login.php');
        //Asign a query
        $query = " SELECT * FROM produk ORDER BY id_produk";
        $result = $db->query( $query );
        if (!$result){
            die ("Could not query the database: <br />". $db->error);
        }
        echo '<div id="prod">';
        while ($row = $result->fetch_object()){
            echo '<div class="container">';
            echo '<div class="card" style="width: 20rem; float:left; margin: 20px; height: 30rem; border-color: #e0bcc1;">';
            $image = $row->image;
            echo '<div class="card-header text-center" style="height: 15rem; background-color: white; border-color: white;">';
            echo '<img src="'.$image.'" width="200">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title" style="height: 5rem; background-color: white; border-color: white; text-align: center;">'.$row->produk_name.'</h5>';
            $harga = "Rp " . number_format($row->price,2,',','.');
            echo '<p class="card-footer" style="background-color: white; border-color: white; text-align: center;">'.$harga.'</p>';
            echo '<div class="text-center"><a id="atcbutton" href="cart.php?id_produk='.$row->id_produk.'" class="btn">ADD TO CART</a></div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        $result->free();
        $db->close();
        ?>
</div>
<?php include ('footer.html') ?>
