<?php
require('header.php');
require('dbconnection.php'); 
?>
<div class="container">
    <table border="1px solid black">
        
        <tr>
            <th>Item Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date Posted</th>
            <th>Image</th>  
        </tr>
<!--        SELECT * FROM allitems INNER JOIN images ON allitems.item_id = images.item_id WHERE allitems.quantity > 0 AND DATEDIFF(allitems.expiry_date, NOW()) > 1-->
        <?php
    $select_items = "SELECT * FROM allitems WHERE allitems.quantity > 0 AND DATEDIFF(allitems.expiry_date, NOW()) > 1";
   // $select_image = "SELECT * FROM images WHERE item_id = '".$_SESSION[]."'";
		$result = $conn->query($select_items);
		
		if ($result->num_rows > 0) 
		{
           
		      
			while($row = $result->fetch_assoc()) 
			{
                 echo "<tr>";
                echo  "<td>".$row["item_id"]."</td>";
                 echo  "<td>" .$row["title"] . "</td>"; 
                echo  "<td>" .$row["description"] . "</td>"; 
                echo  "<td>" .$row["price"] . "</td>"; 
                echo  "<td>" .$row["quantity"] . "</td>"; 
                echo  "<td>" .$row["date_posted"] . "</td>"; 
              
                //selecting and displaying image from the images database corresponding to the item
                 $select_images = "SELECT * FROM images WHERE item_id = '".$row["item_id"]."' LIMIT 1";
                    $result_images = $conn->query($select_images);
                if ($result_images->num_rows > 0) { 
			         while($row_image = $result_images->fetch_assoc()) 
			         {
                 echo  "<td><img src='" .$row_image["image_path"] . "'width=100px; height=100px;</td>"; 
                     }
                    
                }
                else{
                    echo "<td></td>";
                }
                echo "</tr>";
             }
            
            
            
        }
        
    
?>
    </table>









</div>

<?php
require('footer.php')
?>
s