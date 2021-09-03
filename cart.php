<?php
?>
<?php
session_start();

require_once("createdb.php");
require_once("component.php");

$db = new CreateDB($dbname="Productdb",$tablename="Producttb");

if(isset($_SESSION['cart'])){
 if(isset($_POST['remove']))
    if($_GET['action']=="remove"){
        foreach($_SESSION['cart'] as $key=>$value) {
            if($value["product_id"] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product Removed...')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<body>
    <?php
        require_once('header.php');
    ?>

    <div class="my_cart">
       <div class="wrapper">
          <h6>My Cart</h6>
          <hr>
            <?php
            $total = 0;
              if(isset($_SESSION['cart'])){
                  $sql = "SELECT * FROM producttb";
                  $product_id = array_column($_SESSION['cart'], 'product_id');
                  $result = mysqli_query($db->con,$sql);
                  while ($row = mysqli_fetch_assoc($result)){
                     foreach ($product_id as $id){
                         if ($row['id'] == $id){
                            cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['item_description'],$row['id']);
                           $total = $total + (int)$row['product_price'];
                        }
                     }
                  }
              }else{
                  echo "<h5>Cart Is Emprty</h5>";
              }
            ?>     
       </div>
    </div>
   
<div class="price_dets">
    <div class="wrapper">
         <?php
          echo "<div>Price Details</div>";
          echo "<hr>";
               if(isset($_SESSION['cart'])){
                   $count = count($_SESSION['cart']);
                   echo "<h6 style='font-size:1.2rem;'>Price($count items):$total</h6>";
               }else{
                echo "<h6>Price(0 items)</h6>";
               }
             ?>
             <p>Delivery Charges</p>
             <P style="color:green">FREE</P>
             <hr>
             <p>Amount Payable</p>
             <p><?php echo $total; ?></p>
    </div>
 </div>
</body>
</html>
<?php
?>