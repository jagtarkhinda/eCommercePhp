<?php
require('header.php');
require('dbconnection.php');
if(isset($_POST["itemid"]))
{
  ?>
<div class="container">
<div class="row">
  <div class="col-md-4">
  </div>
  <div class="col-md-4">
    <h1 style="text-align:center; background-color:#343333;color:white; border:1px solid white; width:wrap-content;" class="h3 mb-3 font-weight-normal">Confirm Purchase Details</h1> <br>
  </div>
  <div class="col-md-4">
  </div>
</div>
  <?php
 $select_items = "SELECT * FROM allitems WHERE item_id ='".$_POST['itemid']."'";
 $result = $conn->query($select_items);
 if ($result->num_rows > 0)
 {
 while($row = $result->fetch_assoc())
 {?>
   <table class="table">
     <thead class="thead">
       <tr>

           <th>Title</th>
           <th>Description</th>
           <th>Total Price</th>
           <th>Total Quantity</th>
       </tr>
     </thead>
     <?php
     //calculating the total price
     $total_price =  $row["price"] * $_POST["itemquantity"];
     $quan_left = $row["quantity"] - $_POST["itemquantity"];
     $item_id_send = $row["item_id"];
     echo "<tr>";
     //  echo  "<td>" .$row["item_id"] . "</td>";
     echo  "<td>" .$row["title"] . "</td>";
    echo  "<td>" .$row["description"]. "</td>";
    echo  "<td> CDN$: " .$total_price. "</td>";
    echo  "<td>" . $_POST["itemquantity"] . "</td>";
    echo "</tr> </table>";
 }
 }

?>
  <div id="signlog">
  <form class="form-signin" method="post" action="done.php">
      <label for="inputName" class="sr-only">Name</label>
      <input type="hidden" name="quan_left" value="<?php echo $quan_left; ?>" >
      <input type="hidden" name="id_send" value="<?php echo $item_id_send; ?>" >
      <br>
      <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" required autofocus>
      <br>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
      <br>
      <label for="inputAddress">Enter Address Details</label>
      <textarea style="width:100%;" name="address" ></textarea><br /><br />
      <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Confirm Purchase</button>

</div>
</div>
<?php
}else{
  header("Location: view_items.php");
}
require('footer.php')
?>
