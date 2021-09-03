<?php
//start session
session_start();

require_once("createdb.php");
require_once("component.php");

//create instance of createdb class
$database = new CreateDB($dbname="Productdb",$tablename="Producttb");

if (isset($_POST['add'])){
 
    if(isset($_SESSION['cart'])){
        //print_r($_SESSION['cart']);
       $item_arr=  array_column($_SESSION['cart'],"product_id");
    
       if(in_array($_POST['product_id'], $item_arr)){
           echo "<script>alert('Product Already Added To Cart')</script>";
           echo "<script>window.location='index.php'</script>";
       }else{
           $count = count($_SESSION['cart']);
           $item_array = array(
            'product_id'=>$_POST['product_id']
        ); 

        $_SESSION['cart'][$count] = $item_array;
       }
    }else{
        $item_array = array(
            'product_id'=>$_POST['product_id']
        ); 

        $_SESSION['cart'][0] = $item_array;
    }
}
?>


    <?php include("header.php");?>
    
    <div class="shoppe">
        <div class="wrapper">
                <?php
                 $sql = "SELECT * FROM producttb";
                 $result = mysqli_query($database->con,$sql);
                 if(mysqli_num_rows($result)>0){
                 while($row = mysqli_fetch_assoc($result)){
                    components($row['product_image'],$row['product_name'],$row['product_price'],$row['item_description'],$row['id']);
                 }}
                 ?>
                </div>
            <div class="clear_fix"></div>
        </div>
    </div>

   <?php  include("footer.php"); ?>