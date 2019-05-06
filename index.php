<?php
require('dbconnection.php');
require('header.php');
?>
<div class="container">
  <p class="heading">
    Recent Sold Items
  </p>
<table class="table  table-hover">
  <thead class="thead-dark">
    <tr>
        <!-- <th>Item Id</th> -->
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Date Sold</th>
    </tr>
  </thead>
<?php

  $query = "SELECT allitems.item_id,allitems.title,allitems.description,allitems.price,solditems.sold_date
  FROM allitems INNER JOIN solditems WHERE solditems.item_id = allitems.item_id ORDER BY solditems.sold_date DESC LIMIT 10";
  //printf("Records affected: %d\n", mysqli_affected_rows($conn));
      $result = $conn->query($query);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc())
      {
        echo "<tr> <a style='text-decoration:none;'href='item_detail.php?id=$row[item_id]'>";
      // echo  "<td>" .$row["item_id"] . "</td>";
        echo  "<td> " .$row["title"] . "</td>";
       echo  "<td>" .$row["description"] . "</td>";
       echo  "<td>" .$row["price"] . "</td>";
       echo  "<td>" .$row["sold_date"] . "</td>";
       echo "</tr>";

      }

}else{
  echo "<p class='else-parts'>
  No items to display</p>";
}

?>
</table>
</div>

<?php
require('footer.php')
?>
