<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embroidery</title>
    <link rel="stylesheet" href="reagan.css">
</head>
<body>

<div class="nav_bar">
        <div class="wrapper">
            <div class="logo">
                <img src="#" alt="Logo Goes Here" class="img_responsive">
            </div>
            <div class="menu text_direction">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>

    <a href="cart.php">
    <div class="cart">
     <div class="wrapper">
        <div class="cart_design">
        <h1>Cart</h1><br>
        <?php
            if(isset($_SESSION['cart'])){
                $count = count($_SESSION['cart']);
                echo " <span class='text-white count_design' id='cart_count'>$count<span>";
            }else{
                echo " <span class='text-white count_design' id='cart_count'>0<span>";
            }
        ?>
       </div>
       <div class="clear_fix"></div>
     </div>
     </a>
    </div>

<?php
?>