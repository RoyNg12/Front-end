<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];

if(isset($_POST['add_to_wishlist'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `wish` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
   
   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to wishlist!';
   }else{
      mysqli_query($conn, "INSERT INTO `wish`(user_id, name, price, image) VALUES('$user_id', '$product_name', '$product_price', '$product_image')") or die('query failed');
      $message[] = 'product added to wishlist!';
   }

};
?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/123.css">
        <title></title>
    </head>
    <body>
        <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
        <?php
            $id=$_GET['id'];
            $query=mysqli_query($conn,"select * from products where id='$id'");
            if(mysqli_num_rows($query) > 0){
            while($fetch_product = mysqli_fetch_array($query))
            {
        ?>
            <form method="post" class="box" action="">
                <center><div class="nameD"><?php echo $fetch_product['name']; ?></div></center>
                    <img class="img-reposinve image-resize" src="images/<?php echo $fetch_product['image']; ?>" alt="">
                    <div class="priceD">RM <?php echo $fetch_product['price']; ?></div>
                    <div class="descD"><?php echo $fetch_product['description']; ?></div>
                    <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                    <input type="submit" value="Add To Wishlist" name="add_to_wishlist" class="btn2">
                </tr>
        <?php 
            }
            } 
        ?>

            </form>
        <a href="index.php"><input type="submit" class="btn" value="Back"></a>
    </body>
</html>
