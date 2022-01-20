<?php include ('header_checkout.html');
session_start();
if(!isset($_SESSION['username'])){
  header('Location: signin.php');
  exit();
}
$uname = $_SESSION['username'];
require_once ('db_login.php');
?>
<?php
if (isset($_POST['submit'])){
    $que = "SELECT * FROM produk JOIN cart
                ON produk.id_produk=cart.id_produk
                WHERE cart.username='".$uname."'";
    $res = $db->query($que);
    if(!$res){
        die("Could not query the database: <br>". $db->error ."<br>Query: ".$que);
    }
    $x = 0;
    while($row = $res->fetch_object()){
        $id_produk = $row->id_produk;
        $jml = $row->jumlah;
        $subtotal = $row->price * $jml;
        $arr[$x] = array($id_produk, $jml, $subtotal);
        $sum_price = $sum_price + ($row->price);
        $pajak = $sum_price * 0.1;
        $sumt = $sum_price + $pajak;
        $x++;
    }
    $query = "INSERT INTO transaksi (total, username) VALUES ($sumt, '$uname')";
    $db->query($query);
    $last = $db->insert_id;

    $query1 = "DELETE FROM cart WHERE username='$uname'";
    $result1 = $db->query($query1);
    if (!$result1){
        die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query1);
    }

    $s = ',';
    $v = '';
    foreach($arr as $array){
        $v = $v . '('.$array[0].','.$last.','.$array[1].','.$array[2].')' . $s;
    }
    $values = substr($v, 0, -1);
    $query2 = "INSERT INTO detail_transaksi (id_produk, id_transaksi, jumlah, subtotal) VALUES ".$values."";
    $result2 = $db->query($query2);
    if (!$result2){
        die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query2);
    } else{
        if (isset($_SESSION['cart'])){
          unset($_SESSION['cart']);
        }
        $db->close();
        header("location:payment.php?id_transaksi=$last");
    }
}
?>
<h4 class="title_co">CHECKOUT</h4>
<br>
<div class="container">
    <div class="card-body">
        <form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
            <table class="table table-hover">
                <tr>
                    <th>Produk</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th colspan="2">Sub Total</th>
                </tr>
                <?php
                $sum_qty = 0;
                $sum_price = 0;
                $query = "SELECT * FROM produk JOIN cart
                            ON produk.id_produk=cart.id_produk
                            WHERE cart.username='".$uname."'";
                $result = $db->query($query);
                if(!$result){
                    die("Could not query the database: <br>". $db->error ."<br>Query: ".$query);
                }
                while($row = $result->fetch_object()){
                    $jml = $row->jumlah;
                    $subtotal = $row->price * $jml;
                    echo '<tr>';
                    echo '<td>'.$row->produk_name.'</td>';
                    $harga = number_format($row->price,2,',','.');
                    echo '<td>Rp '.$harga.'</td>';
                    echo '<td>'.$jml.'</td>';
                    echo '<td>Rp</td>';
                    $subt = number_format($subtotal,2,',','.');
                    echo '<td>'.$subt.'</td>';
                    echo '</tr>';
                    $sum_qty = $sum_qty + ($jml);
                    $sum_price = $sum_price + ($row->price);
                }
                $sump = number_format($sum_price,2,',','.');
                echo '<tr> <th colspan="2" >Total Pesanan</th>
                        <th>'.$sum_qty.'</th>
                        <th>Rp</th>
                        <th>'.$sump.'</th> </tr>';
                echo '<tr> <th colspan="3">Delivery Fee</td>
                        <th colspan="2">FREE</th> </tr>';
                $pajak = $sum_price * 0.1;
                $tax = number_format($pajak,2,',','.');
                echo '<tr> <th colspan="3">Tax</th>
                        <th>Rp</th>
                        <th colspan="2">'.$tax.'</th> </tr>';
                $sumt = $sum_price + $pajak;
                $total = number_format($sumt,2,',','.');
                echo '<tr> <th colspan="3" style="background-color: #e0b0b0">Total Pembayaran</th>
                        <th style="background-color: #e0b0b0">Rp</th>
                        <th style="background-color: #e0b0b0">'.$total.'</th> </tr>';
                $result->free();
                ?>
            </table>
            <div class="card">
                <pre class="card-header">Detail Pengiriman    <a href="edit_profile2.php?uname=<?php echo $uname ?>" class="fas fa-edit"></a></pre>
                <div class="card-body cb-detail">
                    <?php
                        $query2 = "SELECT * FROM customer WHERE username='".$uname."'";
                        $result2 = $db->query($query2);
                        if(!$result){
                            die("Could not query the database: <br>". $db->error ."<br>Query: ".$query2);
                        }
                        while($row2 = $result2->fetch_object()){
                            echo '<pre class="card-title"><i class="fas fa-user"></i>   '.$row2->nama.'</pre>';
                            echo '<pre class="card-title"><i class="fas fa-envelope"></i>   '.$row2->email.'</pre>';
                            echo '<pre class="card-text"><i class="fas fa-phone"></i>   '.$row2->noHP.'</pre>';
                            echo '<pre class="card-text"><i class="fas fa-map-marker-alt"></i>   '.$row2->alamat.'</pre>';
                        }
                        $result2->free();
                    ?>
                </div>
            </div>
            <button id="pay" type="submit" name="submit" value="submit">Pay</button>
        </form>
    </div>
</div>
<?php
?>
<?php include ('footer.html'); ?>
