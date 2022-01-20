<?php
//File      : cart.php
//Deskripsi : untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart
session_start();

?>
<!--Menampilkan isi shopping cart-->
<?php include('header_cart.php') ?>
<br>
<div class="container">
    <div>
        <div class="card-header" id="cart">Shopping Cart</div>
        <div>
            <br>
            <table class="table table-striped">
                <tr>
                    <th class="subcart">Nama Produk</th>
                    <th class="subcart">Price</th>
                    <th class="subcart">Quantity</th>
                    <th class="subcart">Total Price</th>
                    <th></th>
                </tr>
                <?php
                    //include our login information
                    require_once('db_login.php');
                    $sum_qty = 0; //inisialisasi total item di shopping cart
                    $sum_price = 0; //inisialisasi total price di shopping cart
                    if(isset($_SESSION['cart'])){
                      if (is_array($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $id_produk => $quantity){
                          $query = "SELECT * FROM produk WHERE id_produk='".$id_produk."' ORDER BY id_produk";
                          $result = $db->query($query);
                          if (!$result){
                            die("Could not query the database: <br>".$db->error."<br>Query: " .$query);
                          }
                          while ($row = $result->fetch_object()){
                            echo '<tr>';

                            echo '<td class="cart_value">'.$row->produk_name.'</td>';

                            $harga = "Rp " . number_format($row->price,2,',','.');
                            echo '<td class="cart_value">'.$harga.'</td>';

                            echo '<td class="cart_value">'.$quantity.'</td>';
                            $qty = $quantity;

                            $price = $row->price;
                            $hargaquantity = "Rp " . number_format($price*$quantity,2,',','.');

                            echo '<td class="cart_value">'.$hargaquantity.'</td>';
                            $sum_price = $sum_price + ($row->price * $quantity);
                            $sum_qty = $sum_qty + $quantity;

                            echo '<td>
                            <div class="text-center">
                            <a id=mycart class="fas fa-trash-alt fa-2x" href="delete_item.php?id_produk='.$row->id_produk.'&username='.$username.'"></a>
                            </div>
                            </td>';
                          }
                        }
                        // $result->free();
                        // $db->close();
                      }
                      else{
                        echo '<tr><td colspan="6" align="center" class="cart_value">There is no item in shopping cart</td></tr>';
                      }
                      $totalharga = "Rp " . number_format($sum_price,2,',','.');
                      echo '<tr>
                      <td></td>
                      <td></td>
                      <td class="cart_value">'.$sum_qty.'</td>
                      <td class="cart_value">'.$totalharga.'</td>
                      <td></td>
                      </tr>';

                    }
                    else{
                      echo '<tr><td colspan="6" align="center" class="cart_value">There is no item in shopping cart</td></tr>';
                    }
                ?>
            </table>
            <p class="cart_value">Total items = <?php echo $sum_qty; ?></p><br>
            <?php
                echo '<a class="btn cont" href="shop.php">Continue Shopping</a>
                        <a class="btn empty" href="delete_cart.php?username='.$username.'" onclick="return confirm("Are you sure you want to remove this cart?")">Empty Cart</a>
                        <div class="text-right">
                            <a class="btn co" href="checkout.php" type="submit" name="submit" value="submit">Checkout</a>
                        </div>';
                //update data into database
                if(isset($_SESSION['cart'])){
                  $query1 = "SELECT * FROM cart WHERE id_produk=$id_produk AND username='".$username."'";
                  $result1 = $db->query($query1);
                  if (!$result1){
                    die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query1);
                  } else{
                    if ($result1->num_rows > 0){
                      $query = "UPDATE cart SET jumlah=$qty";
                    } else{
                      $query = "INSERT INTO cart (id_produk, username, jumlah) VALUES ($id_produk, '$username', $qty)";
                    }
                  }
                  //execute the query
                  $result = $db->query($query);
                  if (!$result){
                    die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
                  } else{
                    exit();
                  }
                  $result->free();
                  $db->close();
                }
            ?>
        </div>
    </div>
</div>
<?php include('footer.html') ?>
