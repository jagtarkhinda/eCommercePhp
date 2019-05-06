<?php
require('header.php');
require('dbconnection.php');
if(isset($_GET["id"]))
{
?>
<div class="container">
<div class="row">


<!--        SELECT * FROM allitems INNER JOIN images ON allitems.item_id = images.item_id WHERE allitems.quantity > 0 AND DATEDIFF(allitems.expiry_date, NOW()) > 1-->
<div class="col-md-6">
        <?php
        //selecting and displaying image from the images database corresponding to the item
         $select_images = "SELECT * FROM images WHERE item_id = '".$_GET['id']."'";
            $result_images = $conn->query($select_images);
        if ($result_images->num_rows > 0) {
        while($row_image = $result_images->fetch_assoc())
        {
                 echo '<div class="details_page_image">';
                 echo  "<a href='$row_image[image_path]'><img src='$row_image[image_path]'/></a>";
                ?></div><?php

             }
        }
        else{
           echo '<div class="imag">';
         echo  '<img src="image_path"';
                echo '</div>';
        }
        // end of image databse query
?>
</div>
<div class="col-md-6">
<?php
    $select_items = "SELECT * FROM allitems WHERE item_id = '".$_GET['id']."'";
		$result = $conn->query($select_items);
		if ($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc())
			{
         $id_for_author_info = $row["user_id"];
               echo '<div class="title-d">';
                echo $row["title"];
                echo '</div>';

                 echo '<div class="price-d">';
                echo  "CDN$: ".$row["price"];
                echo '</div>';

                echo '<div class="quantity-d">';
               echo  "Quantity in stock: ".$row["quantity"];
               echo '</div>';
                $quan = $row["quantity"];
               echo '<div class="descp-d">';
              echo  $row["description"];
              echo '</div>';

              $select_user = "SELECT * FROM allusers WHERE id = '".$id_for_author_info."'";
              $result2 = $conn->query($select_user);
              if ($result2->num_rows > 0)
              {
                while($row2 = $result2->fetch_assoc())
                {
                 echo '<div class="postedby-d">';
                echo  "Posted By: ".$row2["name"];
                echo '</div>';

               }
             }
             echo '<div class="date-d">';
            echo  $row["date_posted"];
            echo '</div>';


}
}



?>
</div>
</div>
<div class="row">
  <div class="col-md-6">
  </div>
<div class="col-md-3" style="margin-top: 50px;">
<?php
if(isset($_SESSION["id"]))
{
  echo "<form class='form-signin' action='confirm_purchase.php' method='POST'>
  <input type='hidden' name='itemid' value='$_GET[id]'  />
  <label>How many you need?</label>
  <input class='form-control' type='number' name='itemquantity' value='1' min='1' max='$quan'  />
  <br><br>
  <button class='btn btn-lg btn-primary btn-block' name='submit' type='submit'>Purchase</button>
  ";

  // echo  "<a class='btn btn-md btn-success btn-block' href='confirm_purchase.php?id=$_GET[id]&quantity'>Purchase</a>";
}else{
    echo "<button class='btn btn-lg btn-danger btn-block'><a style='color:white; text-decoration:none;' href='login.php'>Login to Purshase</a></button>";
}
?>
<div class="col-md-3">
</div>
</div>
</div>
</div>
<?php
}else{
  header("Location: view_items.php");
}
require('footer.php')
?>
