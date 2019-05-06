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
        </tr>
<?php
    $select_items = "SELECT * FROM allitems WHERE quantity > 0 AND DATEDIFF(expiry_date, NOW()) > 1";
		$result = $conn->query($select_items);
		
		if ($result->num_rows > 0) 
		{
           
		      
			while($row = $result->fetch_assoc()) 
			{
                 echo "<tr>";
                echo  "<td>" .$row["item_id"] . "</td>"; 
                 echo  "<td>" .$row["title"] . "</td>"; 
                echo  "<td>" .$row["description"] . "</td>"; 
                echo  "<td>" .$row["price"] . "</td>"; 
                echo  "<td>" .$row["quantity"] . "</td>"; 
                echo  "<td>" .$row["date_posted"] . "</td>"; 
                echo "</tr>";
             }
            
            
            
        }
        
    
?>
</table>









</div>

<?php
require('footer.php')
?>