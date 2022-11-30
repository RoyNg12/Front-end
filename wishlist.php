<?php
    include 'config.php';
    session_start();
    $user_id = $_SESSION['user_id'];
    
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `wish` WHERE id = '$remove_id'") or die('query failed');
   header('location:wishlist.php');
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `wish` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
             <td><p hidden><?php echo $fetch_cart['id']; ?></p></td>
            <td><img src="images/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td>RM<?php echo $fetch_cart['price']; ?></td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
               </form>
            </td>
            <td>
                <a href="wishlist.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn2" onclick="return confirm('remove item from wishlist?');">remove</a>
<!--                <a href="wishlist.php?id=.$fetch_cart['id']" class="btn">Delete</a>-->
            </td>
            
         </tr>
      <?php
            }
         }
      ?>

        <a href="index.php"><input type="submit" class="btn" value="Back"></a>
    </body>
</html>
