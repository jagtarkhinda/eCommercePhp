<?php
require('header.php');
require('dbconnection.php');
?>
<div class="container tabll">
<?php  if(isset($_GET["comp"]))
  {
    echo "<h1>Purachase Complete</h1>";
  }?>
    <table>

<!--        SELECT * FROM allitems INNER JOIN images ON allitems.item_id = images.item_id WHERE allitems.quantity > 0 AND DATEDIFF(allitems.expiry_date, NOW()) > 1-->
        <?php
    $select_items = "SELECT * FROM allitems WHERE allitems.quantity > 0 AND DATEDIFF(allitems.expiry_date, NOW()) > 1 ORDER BY allitems.date_posted DESC";
   // $select_image = "SELECT * FROM images WHERE item_id = '".$_SESSION[]."'";
		$result = $conn->query($select_items);

		if ($result->num_rows > 0)
		{

		       echo "<tr>";
            $count = 0;
			while($row = $result->fetch_assoc())
			{
                $count++;
                 echo "<td> <a style='text-decoration:none;' href='item_detail.php?id=$row[item_id]'>";

                //selecting and displaying image from the images database corresponding to the item
                 $select_images = "SELECT * FROM images WHERE item_id = '".$row["item_id"]."' LIMIT 1";
                    $result_images = $conn->query($select_images);
                if ($result_images->num_rows > 0) {
			         while($row_image = $result_images->fetch_assoc())
			         {
                           echo '<div class="row">';
                           $_SESSION['showdetail'] =  $row["title"];
                         echo '<div class="imag">';
                 echo  "<img src='$row_image[image_path]'";
                        echo "</div>";

                     }
                }
                else{
                   echo '<div class="imag">';
                 echo  '<img src="image_path"';
                        echo "</div>";
                }
                // end of image databse query
               echo '<div class="title">';
                 echo $row["title"];
                echo "</div>";

                 echo '<div class="price">';
                echo  "CDN$ ".$row["price"];
                echo "</div>";

                 echo "</div>";
                echo "</td </a>";
               if($count == 5)
               {
                    echo "</tr>";
                    echo "<tr>";
                   $count = 0;
               }
             }
             echo "</tr>";


        }else{
          echo "<p class='else-parts'>
          No Items to Display
          </p>";
        }


?>
    </table>






</div>

<?php
require('footer.php')
?>
