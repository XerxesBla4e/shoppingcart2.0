<?php

function components($image,$item_name,$price,$description,$product_id){
    ?>
    <div class="item_box">
        <form action="index.php" method="POST">
                <div class="item_image">
                    <img src="<?php echo $image; ?>" alt="Item Image" class="img_responsive img_curve">
                </div>
                <div class="item_description">
                    <p><?php echo $item_name;?></p>
                    <p><?php echo $price;?></p>
                    <p><?php echo $description;?></p><br>
                   
                   
                    <input class="lnk" type="submit" name="add" value="Add To Cart">
                    <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
              
                </div>
        </form>
     </div>
      <?php
}

function cartElement($image,$item_name,$price,$description,$product_id){
   ?>
    <form action="cart.php?action=remove&id=<?php echo $product_id;?>" method="POST">
    <div class="carter">
       <div class="wrapper">
       <div class="item_box1">
         <div class="item_image1">
             <img src="<?php  echo $image;?>" alt="Item Image" class="img_responsive img_curve">
         </div>
         <div class="item_description1">
             <p><?php  echo $item_name; ?></p>
             <p><?php  echo $price; ?></p>
             <button type="submit" class="btn btn-success" name="save">SaveForLater</button>
             <button type="submit" class="btn btn-danger" name="remove">Remove</button>
         </div>
       </div>
       </form>
      <!-- <div class="clear_fix"></div>-->
    </div>
    

    
    <?php
    }
?>