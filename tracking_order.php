<?php
include 'config.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/tracking.css" type="text/css">
    </head>
    <body>
        <table align="center" border="10px" style="width: 600px; line-height: 60px;">
            <tr>
                <th colspan="4"><h2>Order Record</h2></th>
            </tr>
            <t>
                <th>Name</th>
                <th>Address</th>
                <th>State</th>
                <th>PostCode</th>
            </t>
            
         <?php
         $results = mysqli_query($conn, "SELECT * FROM `order`");
            while($rows= mysqli_fetch_assoc($results)){
                ?>
            <tr>
                <th><?php echo $rows['name']; ?></th>
                <th><?php echo $rows['street']; ?></th>
                <th><?php echo $rows['state']; ?></th>
                <th><?php echo $rows['pin_code']; ?></th>
            </tr>
            <?php
            }
            ?>
        </table>
    <center>
        <a href="index.php">
            <button class="btn btn-view">Back</button>
        </a>
    </center>
    </body>
</html>
