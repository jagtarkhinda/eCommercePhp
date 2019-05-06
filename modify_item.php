<?php
require('header.php');
require('dbconnection.php');

if(isset($_SESSION["id"]) && !empty($_GET["id"]))
{
     //getting id from previous page to use it with the where clause in sql query

?>
<div class="container enter-data">
    <table class="">
        <form method="post" action="">
          <tr>
            <td>
              <td>
                <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
              </td>
            </td>
          </tr>
            <tr>

                <td><label>Title of the item </label></td>
                <td><input type="text" name="title" value="<?php echo $_GET['title'] ?>"></td>
            </tr>
            <tr>
                <td><label>Description </label></td>
                <td><input style="width: 400px;" type="text" name="desp" value="<?php echo $_GET['desp'] ?>"></td>
            </tr>
            <tr>
                <td><label>Price </label></td>
                <td><input type="number" name="price" value="<?php echo $_GET['price'] ?>"></td>
            </tr>
            <tr>
                <td><label>Quantity </label></td>
                <td> <input type="number" name="quantity" value="<?php echo $_GET['quantity'] ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                <button class="btn btn-lg btn-success btn-block" name="submit" type="submit">Update</button>
              </td>
            </tr>
        </form>
    </table>
<?php
if(isset($_POST["submit"]))
{
  $id = $_POST["id"];
  $title = $_POST["title"];
  $description =$_POST["desp"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];

  $modify_query = "UPDATE allitems SET title = '".$title."', description = '".$description."', price = '".$price."',
  quantity = '".$quantity."' WHERE item_id = ".$id." ";
//   echo "UPDATE allitems SET title = '".$title."', description = '".$description."', price = '".$price."',
// quantity = '".$quantity."' WHERE item_id = '".$id."' ";

  $result = $conn->query($modify_query);
  if($result > 0)
  {
    header ("Location: admin_panel.php");
  }
  else{
    echo " Item not Updated";
  }
}
 ?>

<?php

   }
   else{
    header("Location: login.php");
}
require('footer.php')
?>
